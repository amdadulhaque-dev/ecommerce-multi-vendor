<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListsTable extends Migration {
    /**
     * Run the migrations.
     * @return void
    */
    public function up() {
        Schema::create('wish_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment("costumer identification");
            $table->integer('product_id');
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     * @return void
    */
    public function down() {
        Schema::dropIfExists('wish_lists');
    }


}
