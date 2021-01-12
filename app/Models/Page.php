<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereHas(string $string, \Closure $param)
 */
class Page extends Model implements TranslatableContract
{
    use Translatable, Enable;


    protected $fillable = ['image', 'status'];


    public $translatedAttributes = ['title', 'slug', 'description'];


    public $translationModel = 'App\Models\PageTranslation';

    /**
     * @return string
     */
    public function image(){
        return asset('uploads/'.$this->image);
    }

}
