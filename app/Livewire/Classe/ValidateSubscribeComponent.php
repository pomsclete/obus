<?php

namespace App\Livewire\Classe;

use PDF;
use Livewire\Component;
use App\Models\Inscription;
use App\Models\ModePaiement;
use App\Models\MontantInscription;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ValidateSubscribeComponent extends Component
{
    public $inscription;
    public $annee;
    public $search = "";
    public $totIns = false;
    public $sum;
    public $mode_paiement,$montant,$numero="NUMERO PAR DEFAUT";
    public $ins;
    public $just = false;
     use LivewireAlert;
     public $modes = [];

 
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

     public function getModes(){
       return  ModePaiement::select('id','libelle')->get();  
    }

     public function updated($property)
    {
        // $property: The name of the current property that was updated
 
        if ($property === 'mode_paiement') {
            if($this->mode_paiement == 5 || $this->mode_paiement == 4){
                 $this->just = true;
            } else {
                $this->just = false;
            }
            
        }
    }

    public function completeMontant($id){
        $this->modes = $this->getModes();
        $this->montant = $this->getMontantInscription($id)->montant_ins - $this->getMontantDepot($id)  ;
        $this->inscription = $id;
        $this->dispatch('open-modal');
    }
    public function closeModal()
    {
       $this->modes = [];
        $this->just = false;
        $this->resetValidation();
        $this->inscription = null;
        $this->numero = null;
        $this->mode_paiement = null;
         $this->dispatch('close-modal');  
    }

     public function saveInscription(){
        $this->validate([
            "mode_paiement" => "required",
            "montant" => "required|numeric",
        ]);
        try {
            $mont = MontantInscription::create([
            "mode_paiement_id" => $this->mode_paiement,
            'inscription_id' => $this->inscription,
            'montant' => $this->montant,
            'justificatif' => $this->numero,
            'user_id' => Auth::user()->id,

        ]);
     
         $this->alert('success', "Successfully !", [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => "Le montant de ".$this->montant." a été enregistré avec succès",
            'showConfirmButton' => false,
            'showCancelButton' => false,
            'timerProgressBar' => true,
            'onOpen' => 'setTimeout(function () {  }, 1000)',
            'onClose' => 'setTimeout(function () {  }, 1000)',
        ]);
         $this->closeModal();
        
       } catch (\Throwable $th) {
           dd($th);
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
            $ins->actif_ins = 2;
            $ins->save();
            $this->alert('success', "Successfully !", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => "L'inscription a été annulée avec succès",
                'showConfirmButton' => false,
                'showCancelButton' => false,
                'timerProgressBar' => true,
                'onOpen' => 'setTimeout(function () {  }, 1000)',
                'onClose' => 'setTimeout(function () {  }, 1000)',
            ]);
            $this->closeModalConfirm();
        }
    }
     public function generatePDF()
    {      
        $pdf = PDF::loadView('myPDF');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf->setPaper('a');
        return response()->streamDownload(function () use ($pdf) {
        echo $pdf->stream();
        }, 'name.pdf');

    }
    public function render()
    {
        $word = $this->search;
        return view('livewire.classe.validate-subscribe-component',[
             'waits' => Inscription::select('inscriptions.id as id','name','numero_etudiant','code','boursier')
                                    ->join( 'etudiants', 'etudiants.id', '=', 'inscriptions.etudiant_id')
                                    ->join( 'users', 'users.id', '=', 'etudiants.user_id')
                                    ->join( 'classes', 'classes.id', '=', 'inscriptions.classe_id')
                                    ->where('actif_ins', 1)
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
