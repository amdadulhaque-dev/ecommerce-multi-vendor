<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration {


    /**
     * Run the migrations.
     * @return void
    */
    public function up() {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address');
            $table->integer("status")->default("1")->comment("1=Active, 2=Delete");
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vendors');
    }









}
