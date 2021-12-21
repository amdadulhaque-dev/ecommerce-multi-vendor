<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
    */



    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('category_tagline');
            $table->string('category_photo');
            $table->string('hide/show')->default("hide");
            $table->integer("status")->default("1")->comment("1=Active, 2=Delete");
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
    */
    public function down() {
        Schema::dropIfExists('categories');
    }



}
