<?php

namespace App\Http\Livewire\Master\Roles;

use Livewire\Component;

class FormOfRole extends Component
{
    public $open = false;

    public function render()
    {
        return view('livewire.master.roles.form-of-role');
    }
}
