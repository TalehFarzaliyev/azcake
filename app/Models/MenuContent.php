<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuContent extends Model
{
    protected $fillable = [
        'menu_id',
        'page_id',
        'category_id',
        'parent_id',
        'route',
        'free',
        'lang',
        'sort'
    ];

    public function children(){
        return $this->hasMany(MenuContent::class,'parent_id','id')->orderBy('sort','ASC');
    }

    public function page(){
        return $this->hasOne(Page::class,'id','page_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
