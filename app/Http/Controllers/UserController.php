<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

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
}
