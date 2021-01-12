<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(int[] $array)
 */
class ProductAttribute extends Model implements TranslatableContract
{
    use Translatable, Enable;

    protected $fillable = [
        'status'
    ];

    public $translatedAttributes = ['name', 'slug', 'description'];

    public $translationModel = 'App\Models\ProductAttributeTranslation';

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
