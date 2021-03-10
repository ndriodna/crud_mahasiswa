<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Request\UserRequest;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // dd(Auth::user()->getRoleNames());
        $users = User::orderBy('created_at','DESC')->get();
        return view('users.index',compact('users'));
    }

    public function indexUserLogin()
    {
        $users = User::all();
        return view();
    }

    public function create()
    {
        $roles = Role::all();
        $mahasiswa = Mahasiswa::all();
        return view('users.create',compact('roles','mahasiswa'));
    }

    public function createDosen()
    {
        $roles = Role::all();
        $dosen = Dosen::all();
        return view('users.create-dosen',compact('dosen','roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'kode_user' => 'required',
            'password' => 'required|string|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);
        $user = User::firstOrCreate([
            'email' => $request->email
        ],
        [
            'kode_user' => $request->kode_user,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => false
        ]);
        $user->assignRole($request->role);
        return redirect(route('users.index'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        return view('users.edit',compact('user','mahasiswa'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'kode_user' => 'required',
            'password' => 'nullable|min:6',
            'kode_user' => 'required'
        ]);

        $user = User::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'kode_user' => $request->kode_user,
            'password' => $password
        ]);
        return redirect(route('users.index'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
    // role
    public function roles(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('users.roles',compact('users','roles'));
    }

    public function setRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect()->back();
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        $permission = null;
        $hasPermission = null;

        $roles = Role::all()->pluck('name');

        if (!empty($role)) {
            $getRole = Role::findByName($role);

            $hasPermission = DB::table('role_has_permissions')
            ->select('permissions.name')
            ->join('permissions','role_has_permissions.permission_id', '=','permissions.id')
            ->where('role_id',$getRole->id)->get()->pluck('name')->all();
            $permission = Permission::all()->pluck('name');
        }
        return view('users.role_permissions',compact('roles','permission','hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions'
        ]);
        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        $roles = Role::findByName($role);
        $roles->syncPermissions($request->permission);
        return redirect()->back();
    }
}
