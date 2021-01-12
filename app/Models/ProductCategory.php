<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(int[] $array)
 * @method static whereHas(string $string, \Closure $param)
 */
class ProductCategory extends Model implements TranslatableContract
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
    public $translatedAttributes = ['name', 'slug', 'description'];

    /**
     * @var string
     */
    public $translationModel = 'App\Models\ProductCategoryTranslation';

    /**
     * @return BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsToMany
     */
    public function item() {
        return $this->belongsToMany(ProductCategory::class, Product::class, 'product_category_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function parent(){
        return $this->hasOne(ProductCategory::class,'id','parent_id');
    }
}
