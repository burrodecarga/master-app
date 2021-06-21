<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('master.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::orderBy('name')->get();
        return view('master.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(['name' =>'required|unique:roles']);
       $permissions = $request->permissions;
       $role = Role::create([
           'name' =>$request->name,
        ]);

        if($permissions){
            foreach ($permissions as $permission){
            $role->givePermissionTo($permission);
         }
        }
        return redirect()->route('roles.index')->with('success','Item created successfully!');;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      $permissions = Permission::orderBy('name')->get();
      $permissions_id = $role->permissions->pluck('id');
      //dd($permissions_id);
        return view('master.roles.edit',compact('role','permissions','permissions_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(['name' =>'required|unique:roles,name,'.$role->id]);
        $permissions = $request->permissions;
        $role->name = $request->name;
        $role->save();

         if($permissions){
            $role->syncPermissions($permissions);
          }
          return redirect()->route('roles.index')->with('success','Item updated successfully!');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
       $role->delete();
       return redirect()->route('roles.index')->with('message','ok');
    }
}
