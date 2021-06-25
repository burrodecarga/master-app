<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condominio;
use App\Models\Interest;
use Livewire\Component;

class LegalInterest extends Component
{
    public $condominio, $value,$date;

    protected $rules = [
        'value' => 'required|numeric',
        'date' => 'required|date'
    ];

    public function mount(Condominio $condominio)
    {
        $this->condominio = $condominio;
    }

    public function render()
    {
        return view('livewire.admin.legal-interest',['condominio'=>$this->condominio]);
    }

    public function add(){
        $this->validate($this->rules);
        $interest = Interest::create([
            'condominio_id' => $this->condominio->id,
            'value' => $this->value,
            'date' =>$this->date
        ]);
        $this->emit('renderInterest');
        $this->value = '';
        $this->date = '';
        $condominio = Condominio::find($this->condominio->id);
    }

    public function del(Interest $interest){
        $interest->delete();
        $this->emit('renderInterest');
        $this->condominio = Condominio::find($this->condominio->id);
    }
}
