<?php

namespace App\Livewire\Etudiant;

use Livewire\Component;
use App\Models\Mensualite;
use App\Models\RentreMois;
use App\Models\Inscription;
use App\Models\ModePaiement;
use App\Models\MontantMensualite;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MensualiteComponent extends Component
{
    use LivewireAlert;
    public $annee;
    public $etudiant;
    public $showModal = false;
    public $mois = [];
    public $just = false;
    public $modes = [];
    public $mode_paiement,$mois_paiement,$montant,$numero="NUMERO PAR DEFAUT";

    public function save(){
        $this->validate([
            'mode_paiement' => 'required',
            'montant' => 'required',
            'numero' => 'required',
            'mois_paiement' =>'required'
        ]);
        try {
            $mens = Mensualite::insertGetId([
                'etudiant_id' => $this->etudiant,
                'annee_id' => $this->annee,
                'rentre_mois_id' => $this->mois_paiement,
                'created_at' => now(),
            ]);
           
            MontantMensualite::create([
                'mensualite_id' => $mens,
                'mode_paiement_id' => $this->mode_paiement,
                'montant' => $this->montant,
                'justificatif' => $this->numero,
            ]);
            
            $this->alert('success', "L'inscription de l'étudiant a été enregistré avec succés");
            $this->closeModal();
        } catch (\Throwable $th) {
            dd($th);
        }
       
        
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

    public function getModes(){
        return  ModePaiement::select('id','libelle')->get();  
     }
    public function addMensualite(){
        $this->modes = $this->getModes();
          $this->mois = $this->getMoisMensualite($this->etudiant,$this->annee);
        $this->dispatch('show-modal');
    }

    public function closeModal(){
        $this->modes = [];
        $this->just = false;
        $this->resetValidation();
        $this->mois = [];
        $this->numero = null;
        $this->mode_paiement = null;
         $this->dispatch('hide-modal');  
    }

    public function mount($etudiant,$annee)
    {
        $this->etudiant = intval($etudiant);
        $this->annee = $annee;
      
    }
    public function getMoisMensualite($etudiant,$annee)
    {
        return RentreMois::select('rentre_mois.id','mois.id as moisId','mois.sigle_mois','num_mois','mois')
                        ->join('mois','mois.id','=','rentre_mois.mois_id')
                        ->join('rentres','rentres.id','=','rentre_mois.rentre_id')
                        ->join('inscriptions','inscriptions.rentre_id','=','rentres.id')
                        ->where('inscriptions.etudiant_id', $etudiant)
                        ->where('inscriptions.annee_id', $annee)
                        ->whereNotIn('rentre_mois.id', DB::table('mensualites')
                                                    ->where('annee_id', '=', $annee)
                                                    ->where('etudiant_id', $etudiant)
                                                    ->pluck('rentre_mois_id'))
                        ->orderBy('rentre_mois.id','asc')
                        ->get();
    }
    public function render()
    {
        return view('livewire.etudiant.mensualite-component');
    }
}
