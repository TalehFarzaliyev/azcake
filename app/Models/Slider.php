<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(int[] $array)
 * @property mixed image
 */
class Slider extends Model
{
    use Translatable, Enable, SoftDeletes;


    /**
     * @var string[]
     */
    protected $fillable = ['image', 'status', 'is_home'];


    /**
     * @var string[]
     */
    public $translatedAttributes = ['name', 'slug', 'description', 'button_text'];


    /**
     * @var string
     */
    public $translationModel = 'App\Models\SliderTranslation';

    /**
     * @return string
     */
    public function image(){
        return asset('uploads/'.$this->image);
    }
}
