<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
    ];
}
