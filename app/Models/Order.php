<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_status_id', 'customer_id', 'address', 'total'];

    public function order_products(){
        return $this->hasMany(OrderProduct::class);
    }
}
