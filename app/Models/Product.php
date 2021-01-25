<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find($productId)
 * @method static paginate(int $int)
 * @method static where(int[] $array)
 * @method static whereHas(string $string, \Closure $param)
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 * @method static whereTranslationLike()
 * @method static orderByTranslation()
 * @property mixed image
 */
class Product extends Model implements TranslatableContract
{
    use Translatable, Enable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'product_category_id',
        'status',
        'old_price',
        'price'
    ];

    /**
     * @var string[]
     */
    public $translatedAttributes = ['name', 'slug', 'description'];

    /**
     * @var string
     */
    public $translationModel = 'App\Models\ProductTranslation';

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'product_category_id');
    }

    /**
     * @return HasMany
     */
    public function singleAttribute() {
        return $this->hasMany(SingleProductAttributes::class, 'product_id');
    }

    /**
     * @return HasMany
     */
    public function images() {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

}
