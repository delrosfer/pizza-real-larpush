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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->startingValue(9000);
            $table->foreignId('user_id')->constrained();
            $table->string('address')->nullable();
            $table->string('size')->nullable();
            $table->string('toppings')->nullable();
            $table->string('instructions')->nullable();
            $table->foreignId('status_id')->unsigned()->default(1)->references('id')->on('statuses');
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
        Schema::dropIfExists('orders');
    }
};
