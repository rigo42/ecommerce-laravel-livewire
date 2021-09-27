<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //Foreign
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('gender_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');

            //General
            $table->text('name');
            $table->text('slug');
            $table->longText('detail');
            $table->longText('description');
            $table->string('sku')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price');
            $table->boolean('featured')->nullable()->default(false);
            $table->boolean('stock')->nullable()->default(true);
            $table->integer('view')->nullable()->default(0);

            //Promotion
            $table->boolean('promotion')->nullable()->default(false);
            $table->float('price_promotion')->nullable();
            $table->date('end_promotion')->nullable();

            //Shipping
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();

            //Metatags
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('products');
    }
}
