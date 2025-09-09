<?php

namespace App\Livewire\Classe;

use App\Models\Classe;
use App\Models\Niveau;
use Livewire\Component;
use App\Models\Specialite;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ListeComponent extends Component
{
    public $search = '';
    public $specialites = [];
    public $niveaux = [];
    public $niveau,$specialite,$code;
    public $showModal = false;
    use LivewireAlert;
    public $classeId;

     public function addClasse(){
        $this->dispatch('show-modal'); 
    }


    public function resetInput(){
        $this->resetValidation();
        $this->code = '';
        $this->specialite = '';
        $this->niveau = '';
        $this->classeId = '';
        $this->showModal = false;
        $this->dispatch('hide-modal');
    }
    public function save(){
        $this->validate([
            'code' => 'required|min:3',
            'specialite' => 'required',
            'niveau' => 'required',
        ]);
        $classe = Classe::create([
            'code' => $this->code,
            'specialite_id' => $this->specialite,
            'niveau_id' => $this->niveau,
        ]);
        if($classe){
            $this->alert('success', 'Classe ajoutée avec succès !');
            $this->resetInput();
        }else{
            $this->alert('error', 'Erreur lors de l\'ajout de la classe !');
        }
    }
    public function delete($id){
        $classe = Classe::find($id);
        if($classe){
            $classe->delete();
            $this->alert('success', 'Classe supprimée avec succès !');
        }else{
            $this->alert('error', 'Erreur lors de la suppression de la classe !');
        }
    }
    public function edit($id){
        $this->classeId = $id;
        $classe = Classe::find($id);
        if($classe){
            $this->code = $classe->code;
            $this->specialite = $classe->specialite_id;
            $this->niveau = $classe->niveau_id;
            $this->showModal = true;
            $this->dispatch('show-modal'); 
        }else{
            $this->alert('error', 'Erreur lors de la modification de la classe !');
        }
    }
    public function update(){
        $this->validate([
            'code' => 'required|min:3',
            'specialite' => 'required',
            'niveau' => 'required',
        ]);
        $classe = Classe::find($this->classeId);
        if($classe){
            $classe->update([
                'code' => $this->code,
                'specialite_id' => $this->specialite,
                'niveau_id' => $this->niveau,
            ]);
            $this->alert('success', 'Classe modifiée avec succès !');
            $this->resetInput();
        }else{
            $this->alert('error', 'Erreur lors de la modification de la classe !');
        }
    }
    public function toggleStatus($id)
    {
        $classe = Classe::find($id);
        if ($classe) {
            $classe->is_active = !$classe->is_active;
            $classe->save();
            $this->alert('success', 'Statut de la classe modifié avec succès !');
        } else {
            $this->alert('error', 'Erreur lors de la modification du statut de la classe !');
        }
    }

    public function mount()
    {
        $this->specialites = Specialite::select('id','libelle')
                                ->distinct()
                                ->get();
        $this->niveaux = Niveau::select('id','libelleNiveau')
                                ->distinct()
                                ->get();
        
    }
    public function render()
    {
        $word = $this->search;
        return view('livewire.classe.liste-component',[
            'classes' => Classe::select('classes.id','code','sigle','specialites.libelle','libelleNiveau','classes.is_active')
                                        ->join('specialites','specialites.id','=','classes.specialite_id')
                                        ->join('niveaux','niveaux.id','=','classes.niveau_id')
                                        ->where(function ($query) use ($word) {
                                            $query->orWhere('code', "like", "%" . $word . "%");
                                            $query->orWhere('sigle', "like", "%" . $word . "%");
                                            $query->orWhere('libelle', "like", "%" . $word . "%");
                                            $query->orWhere('libelleNiveau', "like", "%" . $word . "%");})
                                    ->orderBy('classes.is_active','desc')
                                    ->paginate(15)
        ]);
    }
}
