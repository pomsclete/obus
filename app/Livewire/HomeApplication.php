<?php

namespace App\Livewire;

use Livewire\Component;

class HomeApplication extends Component
{
    public function getUrl($route)
    {
        return redirect()->route($route);
    }
    public function render()
    {
        return view('livewire.home-application');
    }
}
