<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'product_name', 'price', 'image', 'quantity', 'avg_rating', 'user_id'
    ];

    public function user() 
    {

    	return $this->belongsTo('App\User');
    }

    public function category() {

        return $this->belongsTo('App\Category');
    }

    public function orders()
    {
    	return $this->belongsToMany('App\Order', 'order_product', 'product_id', 'order_id');
    }

}
