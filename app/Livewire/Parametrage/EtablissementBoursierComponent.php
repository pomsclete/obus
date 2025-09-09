<?php

namespace App\Livewire\Parametrage;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EtablissementBoursier;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EtablissementBoursierComponent extends Component
{
    public $rId ;
    public $editMode = false;
    use LivewireAlert;
    public $libelle,$type;
    public $search="";
    use WithPagination;

    public function save(){
        $validated = $this->validate([ 
            'libelle' => 'required|min:3',
            'type' => 'required|min:3',
        ]);
        if (!empty($this->rId)) {
            $niv = EtablissementBoursier::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'nomEtablissement' => $this->libelle,
                    'typeEtablissement' => $this->type,
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  EtablissementBoursier::create([
                'nomEtablissement' => $this->libelle,
                'typeEtablissement' => $this->type,
            ]);
            $this->alert('success', 'Enregistrement éffectué avec succés');
        }
      
        if($save){
             $this->editMode = false;
            $this->reset([
                'libelle',
                'rId',
                'type'
            ]);
        }  
    }
      public function edit($id)
    {   
        try {
            $this->rId = $id;
            if (!empty($this->rId)) {
                $niv = EtablissementBoursier::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->libelle = $niv->nomEtablissement;
                    $this->type = $niv->typeEtablissement;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = EtablissementBoursier::find($id);
            if ($ueData) {
                $ueData->delete();
            }
            $this->alert('success', 'Etablissement Boursier supprimé avec succès!!');
        } catch (\Exception $ex) {
            $this->alert('success', 'Something goes wrong!!');
        }
    }
    public function render()
    {
        return view('livewire.parametrage.etablissement-boursier-component',[
            'etats' => EtablissementBoursier::where('nomEtablissement', 'like', '%'.$this->search.'%')
                                 ->orderBy('id', 'asc')->paginate(10),
        ]);
    }
}
