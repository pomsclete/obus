<?php

namespace App\Livewire\Classe;

use Livewire\Component;
use App\Models\Inscription;
use App\Models\MontantInscription;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CancelSubscribeComponent extends Component
{
     public $inscription;
    public $annee;
    public $search = "";
    public $totIns = false;
    public $sum;
    public $ins;
    public $just = false;
     use LivewireAlert;

      public function mount($annee){
        $this->annee = $annee;
    }

    public function getMontantDepot($idInscription){
        return  MontantInscription::where('inscription_id', $idInscription)->sum('montant');
    }

    public function getMontantInscription($idInscription){
        return Inscription::select('montant_ins')
                            ->join( 'classes', 'classes.id', '=', 'inscriptions.classe_id')
                            ->join( 'niveaux', 'niveaux.id', '=', 'classes.niveau_id')
                            ->join( 'frais_ins', 'frais_ins.niveau_id', '=', 'niveaux.id')
                            ->join( 'annees', 'annees.id', '=', 'frais_ins.annee_id')
                            ->where('etat_ins', 1)
                            ->where('frais_ins.annee_id', $this->annee)
                            ->where('inscriptions.id', $idInscription)
                            ->first();
    }

    public function verifyMontant($idInscription){
        $ins = $this->getMontantInscription($idInscription);
        if($this->getMontantDepot($idInscription)  == $ins->montant_ins){
            return '<span class="badge badge-success">'.$this->getMontantDepot($idInscription).'</span>';
        }else{
            return '<span class="badge badge-warning">'.$this->getMontantDepot($idInscription) . '/ ' . $ins->montant_ins.'</span>';
         
        }
        
    }
    public function confirmAnnule($id){
        $this->inscription = $id;
        $this->dispatch('show-modal');
    }
    public function closeModalConfirm()
    {
        $this->inscription = null;
        $this->dispatch('hide-modal');  
    }
    public function annuleIns(){
        $ins = Inscription::find($this->inscription);
        if($ins){
            $ins->actif_ins = 1;
            $ins->save();
            $this->alert('success', "Successfully !", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => "L'inscription a été activé de nouveau avec succès",
                'showConfirmButton' => false,
                'showCancelButton' => false,
                'timerProgressBar' => true,
                'onOpen' => 'setTimeout(function () {  }, 1000)',
                'onClose' => 'setTimeout(function () {  }, 1000)',
            ]);
            $this->closeModalConfirm();
        }
    }
    public function render()
    {
        $word = $this->search;
        return view('livewire.classe.cancel-subscribe-component',[
             'waits' => Inscription::select('inscriptions.id as id','name','numero_etudiant','code','boursier')
                                    ->join( 'etudiants', 'etudiants.id', '=', 'inscriptions.etudiant_id')
                                    ->join( 'users', 'users.id', '=', 'etudiants.user_id')
                                    ->join( 'classes', 'classes.id', '=', 'inscriptions.classe_id')
                                    ->where('actif_ins', 2)
                                    ->where('annee_id', $this->annee)
                                    ->where(function ($query) use ($word) {
                                            $query->orWhere('name', "like", "%" . $word . "%");
                                            $query->orWhere('numero_etudiant', "like", "%" . $word . "%");
                                            $query->orWhere('code', "like", "%" . $word . "%");
                                            })
                                    ->paginate(15),
        ]);
    }
}
