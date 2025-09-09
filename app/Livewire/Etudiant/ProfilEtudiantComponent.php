<?php

namespace App\Livewire\Etudiant;

use App\Models\User;
use App\Models\Annee;
use Livewire\Component;

class ProfilEtudiantComponent extends Component
{
    public $etudiant;
    public $annee;
    public $view;

    public function ChangeView($template)
    {
        $this->view = $template;
    }

    public function mount($etudiant){
        $this->etudiant = base64_decode($etudiant);
        $this->annee = Annee::where('isActive',1)->orderBy('id','desc')->first();
        $this->view = 0;
    }
    public function render()
    {
        return view('livewire.etudiant.profil-etudiant-component',[
            'info' => User::select('name','email','profile_photo_path','numero_etudiant',
                                    'telephone','adresse','date_naissance','lieu_naissance','sexe',
                                    'cin','etudiants.id as etudiantId','nationnalites.libelle as nationnalite',
                                    'users.created_at as create')
                                    ->join('etudiants','etudiants.user_id','=','users.id')
                                    ->join('nationnalites','nationnalites.id','=','etudiants.nationnalite_id')
                                    ->where('etudiants.id',$this->etudiant)->first()
        ]);
    }
}
