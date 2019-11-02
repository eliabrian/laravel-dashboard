<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Menu extends Model
{

    use SoftDeletes;


    protected $fillable = [
        'name', 'icon',
    ];

    public function submenus()
    {
        return $this->hasMany('Submenu');
    }

    public function menu()
    {
        return $this->belongsToMany('App\Role');
    }
}
