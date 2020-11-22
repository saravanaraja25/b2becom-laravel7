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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('address_id');
            $table->double('total_price')->nullable();
            $table->string('order_note')->nullable();
            $table->string('order_status')->nullable();
            $table->string('delivery_note')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('invoice')->nullable();
            $table->double('grand_total')->nullable();
            $table->double('discount_amount')->nullable();
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
