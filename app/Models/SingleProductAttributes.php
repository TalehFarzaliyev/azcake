<?php

namespace App\Models;

use App\Enable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SingleProductAttributes extends Model
{
    use Translatable, Enable, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['product_id', 'product_attribute_id', 'price'];


    /**
     * @var string[]
     */
    public $translatedAttributes = ['name'];


    /**
     * @var string
     */
    public $translationModel = 'App\Models\SingleProductAttributesTranslation';
}
