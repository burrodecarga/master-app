<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condominio;
use Livewire\Component;

class SocialList extends Component
{
    protected $listeners=['renderSocial'];
    public $condominio;

    public function mount(Condominio $condominio){
        $this->condominio=$condominio;
    }

    public function render()
    {
        return view('livewire.admin.social-list');
    }

    public function renderSocial(){
        $this->render();
    }
}
