<?php

namespace App\Http\Livewire\Master\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{

    protected $listeners =['editarRole'=>'editarRole'];

    public $role;
    public $open = false;

    public function render()
    {
        return view('livewire.master.roles.edit-role');
    }

    public function editarRole(Role $role){
        dd('xx');
        $this->open = true;
        $this->role = $role;
    }
}
