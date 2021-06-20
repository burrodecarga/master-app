<?php

namespace App\Http\Livewire\Master\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{

    public $open=false;
    public $name,$area;

    public function render()
    {
        return view('livewire.master.roles.create-role');
    }

    public function create(){
      $rules = $this->validate([
          'name' =>'required|unique:roles',
          'area' =>'required'
      ]);
      $role = Role::create($rules);
      $this->reset();
      $this->emit('newRole');
      $message = 'The Role was created success ';
      $this->emit('alert',$message);
    }
}
