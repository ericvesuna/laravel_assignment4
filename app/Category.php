<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';


    protected $fillable = ['category_name'];

   public function product(){

    return $this->hasMany('App\Product');
   }

}

   