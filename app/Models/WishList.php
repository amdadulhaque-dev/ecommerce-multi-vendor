<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model {
    use HasFactory;

    public function relationtoproduct(){
        return $this->hasOne(Product::class,'id' , 'product_id');
    }
}
