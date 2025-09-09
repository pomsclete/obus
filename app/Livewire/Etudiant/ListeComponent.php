<?php

namespace App\Livewire\Etudiant;

use App\Models\User;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Rentre;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Nationnalite;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ListeComponent extends Component
{
    use LivewireAlert;
    public $nom_complet;
    public $adresse;
    public $telephone;
    public $genre,$email,$nationnalite,$date_naissance,$lieu_naissance,$age,$numero_etudiant;
    public $showModal = false;
    public $etudiantId;
    public $search = '';
    public $nationalites = [];
    use WithPagination;
    public $classes = [];
    public $rentres = [];
    public $classe,$rentre,$type;

    public function mount(){
        $this->nationalites = Nationnalite::orderBy('libelle','desc')->get();
    }
     public function addEtudiant(){
        $this->dispatch('show-modal'); 
    }

    public function closeModal(){
        $this->resetValidation();
        $this->showModal = false;
        $this->dispatch('hide-modal'); 
    }

    public function generateNumber($userId) {
            $annee = Annee::select('libelleAnnee')->where('isActive', 1)->orderBy('id','desc')->first();
            ($userId < 10) ? $userId = '0'.$userId : $userId = $userId;
            $uniqueString = 'EPFA-'.$userId .'-'. $annee->libelleAnnee; 

            return $uniqueString; // Pad with leading zeros if needed
        }
   
     public function save(){
        
        $this->validate([  
            'nom_complet' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'date_naissance' => 'required|date|before:-15 years',
            'lieu_naissance' => 'required',
            'telephone' => 'required|numeric',
            'nationnalite' => 'required',
            'genre' => 'required',
  
        ]); 
        DB::beginTransaction();
        try {
          $userId = DB::table('users')->insertGetId([
                 'name' => $this->nom_complet,
                 'email' => $this->email,
                 'role' => 'user',
                 'password' => Hash::make($this->telephone),
                 'created_at' => now()
            ]); 
            if($userId){
                    $etuId = DB::table('etudiants')->insertGetId([
                    'numero_etudiant' => $this->generateNumber($userId),
                    'date_naissance' => $this->date_naissance,
                    'lieu_naissance' => $this->lieu_naissance,
                    'adresse' => $this->adresse,
                    'telephone' => $this->telephone,
                    'sexe' => $this->genre,
                    'nationnalite_id' => $this->nationnalite,
                    'user_id' => $userId,
                    'created_at' => now()
                ]);

            }
              DB::commit(); // finally commit to database
               $this->alert('success', 'Enregistrement éffectué avec succés');
               $this->resetInput();
               $this->addInscription($etuId);
               
            } catch (\Exception $e) {
                DB::rollback(); // roll back if any error occurs
                // something went wrong
                 $this->alert('error', 'Opération annulée, une erreur est survenue!');
            }
    }
    public function resetInput()
    {
        $this->nom_complet = '';
        $this->adresse = '';
        $this->telephone = '';
        $this->age = '';
        $this->genre = '';
        $this->email = '';
        $this->nationnalite = '';
        $this->date_naissance = '';
        $this->lieu_naissance = '';
        $this->closeModal();
        
    }

     public function edit($id)
    {   
        try {
            $this->etudiantId = $id;
            if (!empty($this->etudiantId)) {
                $niv = User::select('users.id','nationnalite_id','users.name','email','adresse','date_naissance','lieu_naissance','numero_etudiant','telephone','sexe')
                             ->join('etudiants','etudiants.user_id','=','users.id')
                             ->where('users.id',$this->etudiantId)->first();
                            
                if ($niv) {
                    $this->nom_complet = $niv->name;
                    $this->adresse = $niv->adresse;
                    $this->telephone = $niv->telephone;
                    $this->date_naissance = $niv->date_naissance;
                    $this->lieu_naissance = $niv->lieu_naissance;
                    $this->genre = $niv->sexe;
                    $this->nationnalite = $niv->nationnalite_id;
                    $this->email = $niv->email;
                    $this->numero_etudiant = $niv->numero_etudiant;
                    $this->showModal = true;
                    $this->dispatch('show-modal');
                }
            }

            $this->alert('info', 'Modification en cours...');
            
        } catch (\Exception $ex) {
            dd($ex);
            $this->alert('warning', 'Something goes wrong!!');
        }
    }

      public function delete($id){
        try {
            $ueData = User::find($id);
            if ($ueData) {
                $ueData->delete();
                $this->alert('success', 'Suppression éffectuée avec succés');
            }
        } catch (\Exception $ex) {
            $this->alert('warning', 'Something goes wrong!!');
        }
    }
    public function update()
    {
        
        $this->validate([  
            'nom_complet' => 'required|min:5',
            'email' => 'required|email',
            'date_naissance' => 'required|date|before:-15 years',
            'lieu_naissance' => 'required',
            'telephone' => 'required|numeric',
            'nationnalite' => 'required',
            'genre' => 'required',
  
        ]); 
        DB::beginTransaction();
        try {
            $userId = DB::table('users')->where('id',$this->etudiantId)->update([
                     'name' => $this->nom_complet,
                     'email' => $this->email,
                     'updated_at' => now()
                ]); 
                if($userId){
                        $etuId = DB::table('etudiants')->where('user_id',$this->etudiantId)->update([
                        'date_naissance' => $this->date_naissance,
                        'lieu_naissance' => $this->lieu_naissance,
                        'adresse' => $this->adresse,
                        'telephone' => $this->telephone,
                        'sexe' => $this->genre,
                        'nationnalite_id' => $this->nationnalite,
                        'updated_at' => now()
                    ]);
                }
                DB::commit(); // finally commit to database
                 $this->alert('success', 'Modification éffectuée avec succés');
                 $this->resetInput();
                } catch (\Exception $e) {
                    DB::rollback(); // roll back if any error occurs
                    // something went wrong
                     $this->alert('error', 'Opération annulée, une erreur est survenue!');
                }
          
           
            
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    /*********************************************
    * TRAITEMENT DE L'INSCRIPTION D'UN ETUDIANT
    **********************************************/

     public function addInscription($etudiant){
        $this->etudiantId = $etudiant;
        $this->rentres = $this->getRentre();
        $this->classes = $this->getClasse();
        $this->dispatch('open-modal'); 
    }

    public function flushData(){
        $this->dispatch('close-modal'); 
        $this->rentres = [];
        $this->classes = [];
        $this->resetValidation();
        $this->etudiantId = '';
        $this->type = '';
    }

    public function saveInscription(){
        $this->validate([
            'classe' => 'required',
            'rentre' => 'required',
            'type' => 'required'
            ]);
        try {
            $an = Annee::where('isActive',1)->orderBy('id','desc')->first();
            Inscription::create([
                'classe_id' => $this->classe,
                'rentre_id' => $this->rentre,
                'boursier' => $this->type,
                'etudiant_id' => $this->etudiantId,
                'user_id' => Auth::user()->id,
                'annee_id' => $an->id,
            ]);
            $this->flushData();
            $this->alert('info', '',[

                            'position' => 'center',
                            'timer' => 7000,
                            'confirmButtonText' => 'OK',
                            'show' => 'true',
                            'confirmButtonColor' => '#00a63e',
                            'showConfirmButton' => true,
                            'title' => "L'étudiant a été inscrit avec succès. Merci de vous approcher du service finance pour la validation"
                            ]);

        } catch (\Throwable $th) {
            dd($th);
        }
        
    }

    public function getClasse(){
        return Classe::orderBy('niveau_id','asc')->get();
    }

    public function getRentre(){
        return Rentre::orderBy('id','asc')->get();
    }
    
    public function render()
    {
         $word = $this->search;
        return view('livewire.etudiant.liste-component',[
            'etudiants' => Etudiant::select('users.id as userId','etudiants.id','name','date_naissance','lieu_naissance','numero_etudiant','telephone')
                                        ->join('users','users.id','=','etudiants.user_id')
                                        ->where(function ($query) use ($word) {
                                            $query->orWhere('numero_etudiant', "like", "%" . $word . "%");
                                            $query->orWhere('name', "like", "%" . $word . "%");
                                            $query->orWhere('telephone', "like", "%" . $word . "%");})
                                    ->orderBy('id','desc')
                                    ->paginate(15)
        ]);
    }
}
