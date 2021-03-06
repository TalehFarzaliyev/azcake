<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SingleProductAttributesTranslation extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];
}
