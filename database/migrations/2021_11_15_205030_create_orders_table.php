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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('shipping_price');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total');
            $table->string('payment_type');
            $table->string('payment_id')->nullable();
            $table->string('shipping_method');
            $table->boolean('paid_out')->default(false);
            $table->enum('status', ['Procesando', 'Completado', 'Cancelado'])->default('Procesando');
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
