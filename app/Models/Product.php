<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'image',
        'price',
        'quantity',
        'seller_id',
        'categories_id'
    ];
    public function seller()
   {
       return $this -> belongsTo(Seller::class,'foreign_key');
   }
}
