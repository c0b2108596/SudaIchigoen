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
        Schema::create('carts_stocks', function (Blueprint $table) {
            $table->foreignId("cart_id")->constrained('carts');
            $table->foreignId("stock_id")->constrained('stocks');
            $table->primary(['cart_id', 'stock_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts_stocks');
    }
};
