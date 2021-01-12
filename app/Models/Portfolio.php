<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model implements TranslatableContract
{
    use Translatable, Enable;


    protected $fillable = ['image', 'status'];


    public $translatedAttributes = ['name', 'slug', 'description'];


    public $translationModel = 'App\Models\PortfolioTranslation';

    /**
     * @return string
     */
    public function image(){
        return asset('uploads/'.$this->image);
    }

}