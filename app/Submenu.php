<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'icon', 'url', 'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
