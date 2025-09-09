<?php

namespace App\Livewire\Parametrage;
use Livewire\Component;

use App\Models\Nationnalite;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class NationnaliteComponent extends Component
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
            $niv = Nationnalite::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'libelle' => $this->libelle
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  Nationnalite::create([
                'libelle' => $this->libelle
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
                $niv = Nationnalite::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->libelle = $niv->libelle;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = Nationnalite::find($id);
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
        return view('livewire.parametrage.nationnalite-component',[
            'nationnalites' => Nationnalite::where('libelle', 'like', '%'.$this->search.'%')
                                 ->orderBy('libelle', 'desc')->paginate(10),
        ]);
    }
}
