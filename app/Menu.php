<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Menu extends Model
{
    protected $table = 'menu';
    protected $dropdown = Array();

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }


//    public static function tree()
//    {
//        return Menu::where('parent_id', '=', '0')->orderBy('order')->get();
//    }
}
