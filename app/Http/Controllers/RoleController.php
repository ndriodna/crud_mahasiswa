<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
    	$roles = Role::get();
    	return view('roles.index',compact('roles'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|max:50'
    	]);
    	$role = Role::create(['name' => $request->name]);
    	return redirect()->back();
    }

    public function destroy($id)
    {
    	Role::findOrFail($id)->delete();
    	return redirect()->back();
    }
}
