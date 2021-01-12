<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryTranslation extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug'
    ];

    public $timestamps = false;
}
