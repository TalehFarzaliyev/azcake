<?php


namespace App;


trait Enable
{
    /**
     * @return mixed
     */
    public static function enable(){
        return self::where('status', 1);
    }

}
