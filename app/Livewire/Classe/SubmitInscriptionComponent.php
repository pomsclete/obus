<?php

namespace App\Livewire\Classe;

use Livewire\Component;
use App\Models\Inscription;

class SubmitInscriptionComponent extends Component
{
    public $inscription,$info;

    public function mount($inscription){
        $this->inscription = base64_decode($inscription);
        $this->info =  Inscription::select('inscriptions.id as id','name','numero_etudiant','code','boursier')
                                    ->join( 'etudiants', 'etudiants.id', '=', 'inscriptions.etudiant_id')
                                    ->join( 'users', 'users.id', '=', 'etudiants.user_id')
                                    ->join( 'classes', 'classes.id', '=', 'inscriptions.classe_id')
                                    ->where('inscriptions.id', $this->inscription)
                                    ->first();

    }
    public function render()
    {
        return view('livewire.classe.submit-inscription-component');
    }
}
