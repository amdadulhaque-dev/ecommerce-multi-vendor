<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    public function relationtocategory() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // public function relationtoproductimage() {
    //     return $this->hasOne(ProductImage::class, 'product_id', 'id');
    // }
    public function relationtowishlist() {
        return $this->hasOne(WishList::class, 'product_id', 'id');
    }

}
