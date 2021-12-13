<?php

namespace App\Http\Livewire;

use Livewire\Component;

class XInput extends Component
{

  public $name;
  public $type;

    public function render()
    {
        return view('livewire.x-input');
    }


}
