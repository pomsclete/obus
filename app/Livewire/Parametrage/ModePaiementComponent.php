<?php

namespace App\Livewire\Parametrage;

use Livewire\Component;
use App\Models\ModePaiement;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ModePaiementComponent extends Component
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
            $niv = ModePaiement::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'libelle' => $this->libelle
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  ModePaiement::create([
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
                $niv = ModePaiement::find($this->rId);
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
            $ueData = ModePaiement::find($id);
            if ($ueData) {
                $ueData->delete();
            }
            $this->alert('success', 'Mode de paiement supprimé avec succès!!');
        } catch (\Exception $ex) {
            $this->alert('success', 'Something goes wrong!!');
        }
    }
    public function render()
    {
        return view('livewire.parametrage.mode-paiement-component',[
            'modes' => ModePaiement::where('libelle', 'like', '%'.$this->search.'%')
                                 ->orderBy('libelle', 'desc')->paginate(10),
        ]);
    }
}
