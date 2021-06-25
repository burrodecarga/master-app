<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condominio;
use Livewire\Component;

class InterestList extends Component
{
    protected $listeners=['renderInterest'];
    public $condominio;

    public function mount(Condominio $condominio){
        $this->condominio=$condominio;
    }
    public function render()
    {
        return view('livewire.admin.interest-list');
    }

    public function renderInterest(){
        $this->render();
    }

    
}
