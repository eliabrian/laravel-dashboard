<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function submenus()
    {
        return $this->hasMany('Submenu');
    }

    public function menu()
    {
        return $this->belongsToMany('App\Role');
    }
}
