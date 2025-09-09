<?php

namespace App\Livewire\Classe;

use App\Models\Annee;
use Livewire\Component;
use App\Models\Inscription;

class InscriptionComponent extends Component
{
    public $annee;
     public $view;
    public function ChangeView($template)
    {
        $this->view = $template;
    }
    
    public function mount(){
        $this->annee = Annee::where('isActive',1)->orderBy('id','desc')->first();
        $this->view = 0;
    }
    public function render()
    {
        return view('livewire.classe.inscription-component',[
            'countWait' => Inscription::select('id') ->where('actif_ins', 0)->get()->count(),
            'countValidate' => Inscription::select('id') ->where('actif_ins', 1)->get()->count(),
            'countAbandon' => Inscription::select('id') ->where('actif_ins', 2)->get()->count(),
        ]);
    }
}
