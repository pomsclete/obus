<?php

namespace App\Livewire\Parametrage;

use App\Models\Annee;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AnneeComponent extends Component
{
    public $rId ;
    public $editMode = false;
    use LivewireAlert;
    public $libelle;
    public $search="";


    public function save(){
        $validated = $this->validate([ 
            'libelle' => 'required|min:3',
        ]);
        if (!empty($this->rId)) {
            $niv = Annee::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'libelleAnnee' => $this->libelle
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  Annee::create([
                'libelleAnnee' => $this->libelle
            ]);
            $this->alert('success', 'Enregistrement éffectué avec succés');
        }
      
        if($save){
             $this->editMode = false;
            $this->reset([
                'libelle',
                'rId'
            ]);
        }  
    }
      public function edit($id)
    {   
        try {
            $this->rId = $id;
            if (!empty($this->rId)) {
                $niv = Annee::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->libelle = $niv->libelleAnnee;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = Annee::find($id);
            if ($ueData) {
                $ueData->delete();
            }
            $this->alert('success', 'Acte supprimé avec succès!!');
        } catch (\Exception $ex) {
            $this->alert('success', 'Something goes wrong!!');
        }
    }
    public function render()
    {
        return view('livewire.parametrage.annee-component',[
             'annees' => Annee::where('libelleAnnee', 'like', '%'.$this->search.'%')
                                 ->orderBy('libelleAnnee', 'desc')->paginate(10),
        ]);
    }
}
