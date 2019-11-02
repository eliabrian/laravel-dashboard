<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\Submenu;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        $menu = Menu::all();
        $sm = Submenu::all();
        return view('menu.index', compact('role', 'menus', 'menu', 'sm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        return view('menu.create', compact('role', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255', 'starts_with:fas fa-fw'],
        ];


        $request->validate($rules);

        Menu::create([
            'name' => $request['name'],
            'icon' => $request['icon'],
        ]);

        return redirect('/user')->with('status', 'Menu added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        return view('menu.edit', compact('role', 'menus', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255', 'starts_with:fas fa-fw'],
        ];


        $request->validate($rules);

        Menu::where('id', $menu->id)
            ->update([
                'name' => $request['name'],
                'icon' => $request['icon'],
            ]);
        return redirect('/menus')->with('status', 'Menu added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect('/menus')->with('status', 'Data has been deleted!');
    }
}
