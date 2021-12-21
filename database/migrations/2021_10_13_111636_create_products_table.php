<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("vendor_id");
            $table->integer("category_id");
            $table->string("product_name");
            $table->integer("product_price");
            $table->string("product_code");
            $table->text("product_short_description");
            $table->longText("product_long_description");
            $table->string("product_photo");
            $table->longText("product_slug");
            $table->integer("product_quantity");
            $table->integer("status")->default("1")->comment("1=Active, 2=Delete");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
