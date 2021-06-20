<?php

namespace App\Http\Livewire\Master\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListOfUsers extends Component
{
    use WithPagination;

    public $search='';
    public function render()
    {

        $users = User::Paginate(5);
        return view('livewire.master.users.list-of-users',compact('users'));
    }
}
