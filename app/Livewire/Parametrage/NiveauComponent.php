<?php

namespace App\Livewire\Parametrage;

use App\Models\Niveau;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class NiveauComponent extends Component
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
            $niv = Niveau::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'libelleNiveau' => $this->libelle
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  Niveau::create([
                'libelleNiveau' => $this->libelle
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
                $niv = Niveau::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->libelle = $niv->libelleNiveau;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = Niveau::find($id);
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
        return view('livewire.parametrage.niveau-component',[
            'niveaux' => Niveau::where('libelleNiveau', 'like', '%'.$this->search.'%')
                                 ->orderBy('id', 'asc')->paginate(10),
        ]);
    }
}
