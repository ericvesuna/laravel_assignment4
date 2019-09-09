<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';


    protected $fillable = ['product_name','product_price','product_image','category_id'];


   public function category() {

    return $this->belongsTo('App\Category');
   }
}

  