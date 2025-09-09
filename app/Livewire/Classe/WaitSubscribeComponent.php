<?php

namespace App\Livewire\Classe;

use Livewire\Component;
use App\Models\Inscription;
use App\Models\ModePaiement;
use App\Models\BourseInscription;
use App\Models\MontantInscription;
use Illuminate\Support\Facades\Auth;
use App\Models\EtablissementBoursier;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class WaitSubscribeComponent extends Component
{
    use LivewireAlert;
    public $inscription;
    public $annee;
    public $modes = [];
    public $etablissements = [];
    public $mode_paiement,$montant,$numero="NUMERO PAR DEFAUT";
    public $etablissement_boursier,$montant_bourse;
    public $just = false;



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
        if ($mont) {
            Inscription::where('id',$this->inscription)->update(['actif_ins' => 1]); 
        }

         $this->alert('success', "L'inscription de l'étudiant a été enregistré avec succés");
         $this->closeModal();
        
        } catch (\Throwable $th) {
           dd($th);
        }

     
    }
    public function mount($annee){
        $this->annee = $annee;
    }

    public function getModes(){
       return  ModePaiement::select('id','libelle')->get();  
    }

    public function accept($id,$bourse){
        $this->modes = $this->getModes();
        $this->inscription = $id;
        if($bourse == 1){
             $this->etablissements = EtablissementBoursier::where('etat',1)->get();
             $this->dispatch('open-modal'); 
        } else {
         $this->dispatch('show-modal'); 
        }
    }

     public function closeModal(){
        $this->modes = [];
        $this->just = false;
        $this->resetValidation();
        $this->inscription = null;
        $this->numero = null;
        $this->mode_paiement = null;
         $this->dispatch('hide-modal');  
    }

    public function addBourse(){
         $this->validate([
            "etablissement_boursier" => "required",
            "montant_bourse" => "required|numeric",
        ]);
        try {
            BourseInscription::create([
                "inscription_id" => $this->inscription,
                "etablissement_boursier_id" => $this->etablissement_boursier,
                "montantBourse" => $this->montant_bourse,
            ]);
            $this->closeModalBourse();
            $this->modes = $this->getModes();
            $this->dispatch('show-modal'); 
        } catch (\Throwable $th) {
            dd($th);
        }
    }

     public function closeModalBourse(){
        $this->etablissements = [];
        $this->etablissement_boursier = null;
        $this->montant_bourse = null;
        $this->resetValidation();
         $this->dispatch('close-modal');  
    }
    public function render()
    {
        return view('livewire.classe.wait-subscribe-component',[
            'waits' => Inscription::select('inscriptions.id as id','name','numero_etudiant','code','boursier')
                                    ->join( 'etudiants', 'etudiants.id', '=', 'inscriptions.etudiant_id')
                                    ->join( 'users', 'users.id', '=', 'etudiants.user_id')
                                    ->join( 'classes', 'classes.id', '=', 'inscriptions.classe_id')
                                    ->where('actif_ins', 0)
                                    ->where('annee_id', $this->annee)
                                    ->paginate(15),
            
        ]);
    }
}
