<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(int[] $array)
 */
class Gallery extends Model
{
    use Translatable, Enable, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['product_id', 'gallery_category_id', 'image', 'status'];

    /**
     * @var string[]
     */
    public $translatedAttributes = ['name', 'slug'];

    /**
     * @var string
     */
    public $translationModel = 'App\Models\GalleryTranslation';

    /**
     * @return HasOne
     */
    public function product() {
        return $this->hasOne(Product::class, 'id');
    }
}
