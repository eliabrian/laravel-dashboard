<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class SubmenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $menu = Menu::all();
        return view('submenu.create', compact('role', 'menus', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu_id = Menu::all()->pluck('id');
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255', 'starts_with:/'],
            'icon' => ['required', 'string', 'max:255', 'starts_with:fas fa-fw'],
            'menu_id' => [
                'required', 'string', 'max:255',
                Rule::in($menu_id),
            ],
        ];


        $request->validate($rules);

        Submenu::create([
            'name' => $request['name'],
            'url' => $request['url'],
            'icon' => $request['icon'],
            'menu_id' => $request['menu_id'],
        ]);

        return redirect('/menus')->with('status', 'Submenu added!');
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
    public function edit(Submenu $submenu)
    {
        //Sidebar
        $auth_user = Auth::user();
        $role = $auth_user->role;
        $menu_id = $role->menu()->pluck('menus.id')->all();
        $menus = Menu::find($menu_id)->all();

        return view('submenu.edit', compact('role', 'menus', 'submenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submenu $submenu)
    {
        $menu_id = Menu::all()->pluck('id');
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255', 'starts_with:/'],
            'icon' => ['required', 'string', 'max:255', 'starts_with:fas fa-fw'],
            'menu_id' => [
                'required', 'string', 'max:255',
                Rule::in($menu_id),
            ],
        ];


        $request->validate($rules);
        Submenu::where('id', $submenu->id)
            ->update([
                'name' => $request['name'],
                'url' => $request['url'],
                'icon' => $request['icon'],
                'menu_id' => $request['menu_id'],
            ]);
        return redirect('/menus')->with('status', 'Submenu added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu)
    {
        Submenu::destroy($submenu->id);
        return redirect('/menus')->with('status', 'Data has been deleted!');
    }
}
