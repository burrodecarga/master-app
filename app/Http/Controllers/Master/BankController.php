<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Condominio;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::orderBy('name')->get();
        return view('master.banks.index',compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = new Bank();
        $condominios = Condominio::orderBy('name')->get();
        return view('master.banks.create',compact('condominios','bank'));

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
            'ctta' =>'required|unique:banks',
            'condominio_id'=>'integer|required',
            'owner'=>'required'
        ]);
        $bank = Bank::create($request->all());
        return redirect()->route('banks.index')->with('success','Item created successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        $condominios = Condominio::orderBy('name')->get();
        return view('master.banks.edit',compact('condominios','bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'name' =>'required',
            'ctta' =>'required|unique:banks,ctta,'.$bank->id,
            'condominio_id'=>'integer|required',
            'owner'=>'required'
        ]);
        $bank->update($request->all());
        return redirect()->route('banks.index')->with('success','Item updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('banks.index')->with('success','Item deleted successfully!');

    }
}
