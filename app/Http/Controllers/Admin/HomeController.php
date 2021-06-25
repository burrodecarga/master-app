<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Condominio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
          $condominios = Condominio::where('user_id',auth()->user()->id)->get();
          if($condominios->count()==0){
              return redirect()->route('dashboard')->with('success','No tiene condominios para administrar');
          }
          return view('admin.index',compact('condominios'));
    }

    public function administrar(Condominio $condominio){
       $brands = Brand::orderBy('name')->get();
       return view('admin.administrar',compact('condominio','brands'));
    }
}
