<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribeCodesTable extends Migration
{
    public function up()
    {
        Schema::create('subscribe_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->boolean('isValid')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribe_codes');
    }
}
