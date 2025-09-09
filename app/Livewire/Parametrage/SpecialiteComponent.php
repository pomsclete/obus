<?php

namespace App\Livewire\Parametrage;

use Livewire\Component;
use App\Models\Specialite;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SpecialiteComponent extends Component
{
    public $rId ;
    public $editMode = false;
    use LivewireAlert;
    public $libelle,$sigle;
    public $search="";

    public function save(){
        $validated = $this->validate([ 
            'libelle' => 'required|min:3',
            'sigle' => 'required|min:2',
        ]);
        if (!empty($this->rId)) {
            $niv = Specialite::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'libelle' => $this->libelle,
                    'sigle' => $this->sigle,
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  Specialite::create([
                'libelle' => $this->libelle,
                'sigle' => $this->sigle
            ]);
            $this->alert('success', 'Enregistrement éffectué avec succés');
        }
      
        if($save){
             $this->editMode = false;
            $this->reset([
                'libelle',
                'rId',
                'sigle',
            ]);
        }  
    }
      public function edit($id)
    {   
        try {
            $this->rId = $id;
            if (!empty($this->rId)) {
                $niv = Specialite::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->libelle = $niv->libelle;
                    $this->sigle = $niv->sigle;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = Specialite::find($id);
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
        return view('livewire.parametrage.specialite-component',[
            'specialites' => Specialite::where('libelle', 'like', '%'.$this->search.'%')
                                 ->orderBy('libelle', 'desc')->paginate(10),
        ]);
    }
}
