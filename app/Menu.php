<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name', 'parent', 'parent_id',
    ];

     public function parent()
    {
        return $this->hasMany('Menu', 'parent_id');
    }

    public function cats()
    {
        return $this->belongsToMany('App\Category','categories_id');
    }
}
