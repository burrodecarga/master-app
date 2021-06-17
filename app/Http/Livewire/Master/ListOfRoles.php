<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListOfRoles extends Component
{

use WithPagination;

    public function render()
    {
        $roles = Role::paginate(5);
        return view('livewire.master.list-of-roles',compact('roles'));
    }
}
