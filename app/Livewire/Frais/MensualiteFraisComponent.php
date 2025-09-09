<?php

namespace App\Livewire\Frais;

use App\Models\Annee;
use App\Models\Niveau;
use Livewire\Component;
use App\Models\FraisMens;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MensualiteFraisComponent extends Component
{
    public $annees = [];
    public $niveaux = [];
    public $search = '';
    public $editMode = false;
    public $montant,$annee,$rId,$niveau;
    use LivewireAlert;

     public function mount(){
        $this->annees = Annee::orderBy('id', 'desc')->get();
        $this->niveaux = Niveau::orderBy('id', 'asc')->get();
    }

     public function save(){
        $validated = $this->validate([ 
            'montant' => 'required|numeric',
            'annee' => 'required',
            'niveau' => 'required',
        ]);
        if (!empty($this->rId)) {
            $niv = FraisMens::find($this->rId);
            if ($niv) {
            $save =  $niv->update([
                    'montant_mens' => $this->montant,
                    'annee_id' => $this->annee,
                    'niveau_id' => $this->niveau
                ]);
             $this->alert('success', 'Modification éffectuée avec succés');
            }
        } else {
            $save =  FraisMens::create([
                    'montant_mens' => $this->montant,
                    'annee_id' => $this->annee,
                    'niveau_id' => $this->niveau
            ]);
            $this->alert('success', 'Enregistrement éffectué avec succés');
        }
      
        if($save){
             $this->editMode = false;
            $this->reset([
                'montant',
                'annee',
                'niveau',
                'rId'
            ]);
        }  
    }
      public function edit($id)
    {   
        try {
            $this->rId = $id;
            if (!empty($this->rId)) {
                $niv = FraisMens::find($this->rId);
                if ($niv) {
                    $this->editMode = true;
                    $this->montant = $niv->montant_mens;
                    $this->annee = $niv->annee_id;
                    $this->niveau = $niv->niveau_id;
                }
            }
           
            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
      public function delete($id){
        try {
            $ueData = FraisMens::find($id);
            if ($ueData) {
                $ueData->delete();
            }
            $this->alert('success', 'Frais supprimé avec succès!!');
        } catch (\Exception $ex) {
            $this->alert('success', 'Something goes wrong!!');
        }
    }

    public function toggleStatus($id)
    {
        $classe = FraisMens::find($id);
        if ($classe) {
            $classe->etat_ins = !$classe->etat_ins;
            $classe->save();
            $this->alert('success', 'Statut du frais modifié avec succès !');
        } else {
            $this->alert('error', 'Erreur lors de la modification du statut du frais !');
        }
    }

    public function render()
    {
        $word = $this->search;
        return view('livewire.frais.mensualite-frais-component',[
            'frais' =>  FraisMens::select('frais_mens.id','montant_mens','etat_mens','libelleAnnee','libelleNiveau')
                                 ->join('annees','annees.id','=','frais_mens.annee_id')
                                 ->join('niveaux','niveaux.id','=','frais_mens.niveau_id')
                                 ->where(function ($query) use ($word) {
                                            $query->orWhere('libelleAnnee', "like", "%" . $word . "%");
                                            $query->orWhere('libelleNiveau', "like", "%" . $word . "%");
                                            $query->orWhere('montant_mens', "like", "%" . $word . "%");})
                                 ->orderBy('frais_mens.id','desc')
                                 ->paginate(10)
        ]);
    }
}
