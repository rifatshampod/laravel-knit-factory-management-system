<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('artwork')->nullable();
            $table->string('style')->nullable();
            $table->string('order_no')->nullable();
            $table->integer('body_color')->nullable();
            $table->integer('print_quality')->nullable();
            $table->integer('parts_name')->nullable();
            $table->string('print_color')->nullable();
            $table->string('color_qty')->nullable();
            $table->string('order_qty')->nullable();
            $table->string('extra_qty')->nullable();
            $table->string('total_qty')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('merchandiser')->nullable();
            $table->integer('supplier')->nullable();
            $table->float('price_dozen', 8, 2)->nullable();
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
}