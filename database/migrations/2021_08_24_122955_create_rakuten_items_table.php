<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRakutenItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rakuten_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->integer('rank')->nullable();
            $table->string('itemName')->nullable();
            $table->string('itemUrl')->nullable();
            $table->string('affiliateUrl')->nullable();
            $table->integer('itemPrice')->nullable();
            $table->text('itemCaption')->nullable();
            $table->integer('reviewCount')->nullable();
            $table->integer('reviewAverage')->nullable();
            $table->string('imageFlag')->nullable();            
            $table->string('mediumImageUrls')->nullable();
            $table->string('shopName')->nullable();
            $table->string('shopUrl')->nullable();
            $table->integer('genreId')->nullable();
            $table->timestamp('created_at', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rakuten_items');
    }
}
