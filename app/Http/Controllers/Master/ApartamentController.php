<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Http\Request;

class ApartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $apartments = Apartment::orderBy('name')->get();
       return view('master.apartments.index',compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $apartment = new Apartment();
        $condominios = Condominio::orderBy('name')->get();
      $users = User::orderBy('name')->get();
      return view('master.apartments.create',compact('users','condominios','apartment'));
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
            'name' =>'required',
            'condominio_id'=>'integer|required',
            'alicuota'=>'required|numeric'
        ]);

       $apartment = Apartment::create($request->all());
       return redirect()->route('apartments.index')->with('success','Item created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $condominios = Condominio::orderBy('name')->get();
        $users = User::orderBy('name')->get();
        return view('master.apartments.edit',compact('users','condominios','apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'name' =>'required',
            'condominio_id'=>'integer|required',
            'alicuota'=>'required|numeric'
        ]);
        $apartment->update($request->all());
        return redirect()->route('apartments.index')->with('success','Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
            return redirect()->route('apartments.index')->with('success','Item deleted successfully!');
    }
}
