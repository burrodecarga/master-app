<?php

namespace App\Http\Livewire\Master\Roles;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListOfRoles extends Component
{

use WithPagination;

protected $listeners=['newRole'=>'render','confirmaEliminarRole'=>'confirmaEliminarRole'];

public $borrarID,$roleID=null;
public $role,$name,$area;
public $open_edit = false;
public $search ='';

    public function render()
    {
        $roles = Role::where('name','like','%'.$this->search.'%')->paginate(5);
        return view('livewire.master.roles.list-of-roles',compact('roles'));
    }

    public function deleteConfirm($id){

      $this->borrarID =$id;

      $this->dispatchBrowserEvent('eliminarRole');
    }

    public function confirmaEliminarRole(){

        $role =Role::find($this->borrarID);
        $role->delete();
    }

    public function edit(Role $role){
      $this->role = $role;
      $this->name = $role->name;
      $this->area = $role->area;
      $this->roleID = $role->id;
      $this->open_edit = true;
      }

    public function update(Role $role){

       $data = $this->validate([
        'name' =>['required',Rule::unique('roles')->ignore($this->role->id)],
        'area' =>'required'
       ]);
       $record = Role::find($this->role->id);
       $record->update([
            'name' => $data['name'],
            'area' => $data['area'],
        ]);

        $this->emit('alert','El role se actualizó correctamente');
        $this->open_edit = false;
        $this->reset();
        $this->render();
    }





}
