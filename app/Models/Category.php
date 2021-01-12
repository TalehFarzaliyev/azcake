<?php

namespace App\Models;

use App\Enable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(int[] $array)
 */
class Category extends Model
{
    use Translatable, Enable;

    protected $fillable = [
        'status',
        'parent_id'
    ];

    public $translatedAttributes = [
        'name',
        'description',
        'slug'
    ];

    public $translationModel = 'App\Models\CategoryTranslation';

    /**
     * @return HasOne
     */
    public function parent(){
        return $this->hasOne(Category::class,'id','parent_id');
    }

    /**
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

}
