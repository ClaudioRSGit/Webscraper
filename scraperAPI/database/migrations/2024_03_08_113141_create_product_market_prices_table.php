<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMarketPricesTable extends Migration
{
    public function up()
    {
        Schema::create('product_market_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('market_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('price');
            $table->string('link');
            $table->string('currency');
            $table->string('tag');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_market_prices');
    }
}
