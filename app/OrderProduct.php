<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    protected $table = 'order_product';
}
