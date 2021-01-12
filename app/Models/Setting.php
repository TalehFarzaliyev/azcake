<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(int[]|string[] $array, array $array1)
 * @method static where(string $string, $key)
 */
class Setting extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'key',
        'value'
    ];

    public static function value($key){
        $value = self::where('key',$key)->select('value')->first();
        return $value ? $value->value : null;
    }

}
