<?php

namespace App\Livewire\Parametrage;

use App\Models\Mois;
use App\Models\Rentre;
use Livewire\Component;
use App\Models\RentreMois;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RentreComponent extends Component
{
    public $rId,$rentreId;
    public $editMode = false;
    use LivewireAlert;
    public $titre;
    public $search="";
    public $mois = [];

    public function save(){
        $validated = $this->validate([ 
            'titre' => 'required|min:3',
        ]);
        if (!empty($this->rId)) {
            $niv = Rentre::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'titre' => $this->titre
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  Rentre::create([
                'titre' => $this->titre
            ]);
            $this->alert('success', 'Enregistrement éffectué avec succés');
        }
      
        if($save){
             $this->editMode = false;
            $this->reset([
                'titre',
                'rId'
            ]);
        }  
    }
      public function edit($id)
    {   
        try {
            $this->rId = $id;
            if (!empty($this->rId)) {
                $niv = Rentre::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->titre = $niv->titre;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = Rentre::find($id);
            if ($ueData) {
                $ueData->delete();
            }
            $this->alert('success', 'Rentrée supprimée avec succès!!');
        } catch (\Exception $ex) {
            $this->alert('success', 'Something goes wrong!!');
        }
    }

    public function addMois($id){
        $this->rentreId = $id;
        $this->dispatch('show-modal'); 
    }

     public function closeModal(){
        $this->dispatch('hide-modal'); 
    }

    public function mount(){
        $this->mois = Mois::orderBy('id', 'asc')->get(); 
    }
     public function linker($moisId)
    {
       $have = RentreMois::where('rentre_id', '=', $this->rentreId)
                        ->where('mois_id', '=', $moisId)
                        ->first();
            if($have){
                $have->delete();
            } else{
                RentreMois::create([
                    'rentre_id' => $this->rentreId,
                    'mois_id' => $moisId,
                ]);
            }

    }

     public function having($id=0){
        $have = DB::table('rentre_mois')
            ->select(DB::raw('count(*) as countD'))
            ->where('rentre_id', '=', $this->rentreId)
            ->where('mois_id', '=', $id)
            ->first();
        if($have->countD){
            return true;
        } else {
            return  false;
        }
    }
    public function render()
    {
        return view('livewire.parametrage.rentre-component',[
            'rentres' =>  Rentre::where('titre', 'like', '%'.$this->search.'%')
                                 ->orderBy('titre', 'asc')->paginate(10),
        ]);
    }
}
