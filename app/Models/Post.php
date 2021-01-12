<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * @method static findOrFail(int $id)
 * @method static whereTranslationLike(string $string, string $string)
 * @method static create(array $data)
 * @method static where(int[] $array)
 */
class Post extends Model implements  TranslatableContract
{
    use Translatable, Enable;


    protected $fillable = ['image', 'status', 'category_id'];


    public $translatedAttributes = ['name', 'slug', 'description'];


    public $translationModel = 'App\Models\PostTranslation';

    /**
     * @return string
     */
    public function image(){
        return asset('uploads/'.$this->image);
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
