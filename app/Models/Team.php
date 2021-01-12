<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model implements TranslatableContract
{
    use Translatable, Enable, SoftDeletes;


    protected $fillable = ['image', 'status', 'facebook', 'instagram', 'email', 'phone', 'website'];


    public $translatedAttributes = ['name', 'slug', 'description', 'position'];


    public $translationModel = 'App\Models\TeamTranslation';

    /**
     * @return string
     */
    public function image(){
        return asset('uploads/'.$this->image);
    }

}
