<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int $int)
 */
class Language extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'direction', 'status', ];


    /**
     * Bu fonksion lazim olacak
     *
     * @return array
     */
    public static function getCodeName(){

        $langArray = [];

        foreach (self::where('status', 1)->select('code','name')->get() as $lang){
            $langArray[$lang->code] = $lang->name;
        }

        return $langArray;
    }

}
