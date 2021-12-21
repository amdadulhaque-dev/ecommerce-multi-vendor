<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration {
    /**
        * Run the migrations.
        * @return void
    */
    public function up() {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment("costumer identification");
            $table->integer('vendor_id')->comment("vendor identification");
            $table->integer('product_id');
            $table->integer('quantity')->default(1)->comment("product amount");
            $table->timestamps();
        });
    }



    /**
        * Reverse the migrations.
        * @return void
    */
    public function down() {
        Schema::dropIfExists('carts');
    }



}
