<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(int[] $array)
 */
class GalleryCategories extends Model
{
    use Translatable, Enable, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'parent_id',
        'status'
    ];

    /**
     * @var string[]
     */
    public $translatedAttributes = ['name', 'slug'];

    /**
     * @var string
     */
    public $translationModel = 'App\Models\GalleryCategoryTranslation';
}
