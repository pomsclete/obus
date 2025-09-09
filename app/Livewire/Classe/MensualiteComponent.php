<?php

namespace App\Livewire\Classe;

use App\Models\Annee;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\RentreMois;

class MensualiteComponent extends Component
{
    public $classe,$annee;
    public $etudiants = [];
    public $mois = [];
    public $eleve;

    public function updatedClasse()
    {
        // $property: The name of the current property that was updated
        $this->etudiants = $this->getEtudiant($this->classe);   
    }

    public function show()
    {
        $this->mois = $this->getMoisMensualite($this->eleve);
    }

   

    public function getMoisMensualite($eleve)
    {
        return RentreMois::select('mois.id','mois.sigle_mois','num_mois','mois')
                        ->join('mois','mois.id','=','rentre_mois.mois_id')
                        ->join('rentres','rentres.id','=','rentre_mois.rentre_id')
                        ->join('inscriptions','inscriptions.rentre_id','=','rentres.id')
                        ->where('etudiant_id', $eleve)
                        ->where('inscriptions.annee_id', $this->annee->id)
                        ->orderBy('rentre_mois.id','asc')
                        ->get();
    }
    public function getEtudiant($classe)
    {
        return Etudiant::select('name','etudiants.id')
                        ->join('users','users.id','=','etudiants.user_id')
                        ->join('inscriptions','inscriptions.etudiant_id','=','etudiants.id')
                        ->join('classes','classes.id','=','inscriptions.classe_id')
                        ->where('classe_id', $classe)
                        ->where('inscriptions.annee_id', $this->annee->id)
                        ->get();
    }
    public function render()
    {
        $this->annee = Annee::where('isActive',1)->orderBy('id','desc')->first();
        return view('livewire.classe.mensualite-component',[
            'classes' =>  Classe::select('classes.id','code','sigle')
                                        ->join('specialites','specialites.id','=','classes.specialite_id')
                                        ->join('niveaux','niveaux.id','=','classes.niveau_id')
                                    ->orderBy('classes.is_active','desc')
                                    ->get()
        ]);
    }
}
