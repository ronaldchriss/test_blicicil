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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->string('product');
            $table->string('quantity');
            $table->string('price');
            $table->string('q_price');
            $table->timestamps();
        });

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('transaction_id')->references('id')->on('transactions')->OnDelete();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
