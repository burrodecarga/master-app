<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Condominio;
use App\Models\Social;
use Livewire\Component;

class SocialMedia extends Component
{
    public $condominio;
    public $brand_id, $url;
    protected $rules = [
        'brand_id' => 'required',
        'url' => 'required'
    ];

    public function mount(Condominio $condominio)
    {
        $this->condominio = $condominio;
    }

    public function render()
    {
        $brands = Brand::orderBy('name')->get();
        return view('livewire.admin.social-media', [
            'condominio' => $this->condominio,
            'brands' => $brands
        ]);
    }

    public function add()
    {
        $value = $this->validate($this->rules);
        $brand = Brand::find($value['brand_id']);
        $social = Social::create([
            'condominio_id' => $this->condominio->id,
            'url' => $value['url'],
            'name' => $brand->name,
            'tipo' => $brand->tipo
        ]);
        $this->emit('renderSocial');
        $this->name = '';
        $this->url = '';
        $this->brand_id ='';
        $this->condominio = Condominio::find($this->condominio->id);
    }

    public function del(Social $social){
        $social->delete();
        $this->emit('renderSocial');
        $this->condominio = Condominio::find($this->condominio->id);
    }
}
