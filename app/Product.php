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

    /*public function orders()
    {
    	return $this->belongsToMany('App\Order', 'order_product', 'order_id', 'product_id');
    }*/

    // public function orders()
    // {
    //     return $this->belongsToMany('App\Order')
    //                     ->using('App\UserRole')
    //                     ->withPivot([
    //                         'created_by',
    //                         'updated_by'
    //                     ]);
    // }
}
