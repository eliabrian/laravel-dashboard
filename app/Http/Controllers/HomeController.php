<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();
        $users = User::all();


        return view('home', compact('role', 'menus', 'users',));
    }
}
