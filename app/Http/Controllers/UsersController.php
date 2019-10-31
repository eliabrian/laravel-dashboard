<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        $users = User::all();

        return view('user.index', compact('role', 'menus', 'users',));
    }

    public function create()
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        $roles = Role::all();

        return view('user.create', compact('role', 'menus', 'roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'role_id' => ['required', 'in:1,2'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];


        $request->validate($rules);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'role_id' => $request['role_id'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/user')->with('status', 'User added!');
    }

    public function edit(User $user)
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        $roles = Role::all();

        return view('user.edit', compact('role', 'roles', 'menus', 'user',));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role_id' => ['required', 'in:1,2'],
        ];



        $request->validate($rules);

        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'role_id' => $request->role_id
            ]);
        return redirect('/users')->with('status', 'User has been updated!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('status', 'Data has been deleted!');
    }
}
