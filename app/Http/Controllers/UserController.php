<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        //Sidebar
        $user = Auth::user();
        $role = $user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        $users = User::all();

        return view('user.index', compact('role', 'menus', 'users',));
    }

    public function create()
    {
        //Sidebar
        $user = Auth::user();
        $role = $user->role;
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
            'role_id' => ['required', 'numeric'],
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
}
