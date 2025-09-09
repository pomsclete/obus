<?php

namespace App\Livewire\Parametrage;

use Livewire\Component;

class ParametrageComponent extends Component
{
    public function getUrl($url){
        return $this->redirect($url, navigate: false);
    }
    public function render()
    {
        return view('livewire.parametrage.parametrage-component');
    }
}
