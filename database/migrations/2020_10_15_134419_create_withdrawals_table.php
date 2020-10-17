<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('barcode');
            $table->foreign('barcode')->on('cards')->references('barcode')->cascadeOnDelete();
            $table->bigInteger('amount')->default(0);

            $table->dateTime('date');

            $table->foreignId('user_id');
            $table->foreign('user_id')->on('users')->references('id');

            $table->bigInteger('orderNo')->nullable();

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
        Schema::dropIfExists('withdrawals');
    }
}
