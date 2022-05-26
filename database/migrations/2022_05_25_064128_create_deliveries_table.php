<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->date('first_receive')->nullable();
            $table->integer('today_receive')->nullable();
            $table->integer('total_receive')->nullable();
            $table->integer('receive_balance')->nullable();
            $table->integer('today_delivery')->nullable();
            $table->integer('total_delivery')->nullable();
            $table->integer('delivery_balance')->nullable();
            $table->integer('status')->nullable();
            $table->integer('delivery_status')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}