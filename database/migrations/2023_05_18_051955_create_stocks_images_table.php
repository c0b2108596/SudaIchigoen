<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId("stock_id")->constrained();
            $table->string("stock_img_name", 30);
            $table->string("stock_img_url", 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks_images');
    }
};
