<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(int[] $array)
 */
class Faq extends Model implements TranslatableContract
{
    use Translatable, Enable;

    protected $fillable = ['status','sort'];

    public $translatedAttributes = ['title', 'description'];


    public $translationModel = 'App\Models\FaqTranslation';
}
