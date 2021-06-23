<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CondominioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $condominios = Condominio::orderBy('name')->get();
       return view('master.condominios.index',compact('condominios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $condominio = new Condominio();
        $users = User::orderBy('name')->get();
        return view('master.condominios.create',compact('users','condominio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' =>'required|unique:condominios',
            'email' =>'required|email|unique:condominios',
            'address' =>'required',
            'phone' =>'required',
            'mobil'=>'required',
            'user_id'=>'integer|required'
        ]);
       $condominio = Condominio::create($request->all());
       if ($request->file('logo')) {
           $url = $request->file('logo')->store('logos','public');
           $condominio->logo = $url;
           $condominio->save();
       }
       return redirect()->route('condominios.index')->with('success','Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function show(Condominio $condominio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Condominio $condominio)
    {
        $users = User::orderBy('name')->get();
        return view('master.condominios.edit',compact('users','condominio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condominio $condominio)
    {
        $request->validate([
            'name' =>'required|unique:condominios,name,'.$condominio->id,
            'email' =>'required|email|unique:condominios,email,'.$condominio->id,
            'address' =>'required',
            'phone' =>'required',
            'mobil'=>'required',
            'user_id'=>'integer|required'
        ]);

       $condominio->update([
           'name' =>$request->input('name'),
           'rut' => $request->input('rut'),
           'address' =>$request->input('address'),
           'phone' => $request->input('phone'),
           'mobil' => $request->input('mobil'),
           'email' =>$request->input('email'),
       ]);
       $condominio->save();
       if ($request->file('logo')){
           if($condominio->logo){
            if(File::exists(public_path('storage/'.$condominio->logo))){
                File::delete(public_path('storage/'.$condominio->logo));
            }else{
               // dd('File does not exists. '.public_path('storage/'.$condominio->logo));
            }
             }
           $url = $request->file('logo')->store('logos','public');
           $condominio->logo = $url;
           $condominio->save();
       }

       return redirect()->route('condominios.index')->with('success','Item created successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condominio $condominio)
    {
        if($condominio->logo){
            if(File::exists(public_path('storage/'.$condominio->logo))){
                File::delete(public_path('storage/'.$condominio->logo));
            }else{
               // dd('File does not exists. '.public_path('storage/'.$condominio->logo));
            }
            $condominio->delete();
            return redirect()->route('condominios.index')->with('success','Item deleted successfully!');

    }
}
}
