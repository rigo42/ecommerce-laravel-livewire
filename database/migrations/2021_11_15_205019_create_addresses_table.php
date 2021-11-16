<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('country')->nullable();
            $table->string('state');
            $table->string('municipality');
            $table->string('colony');
            $table->string('zip_code');
            $table->string('street_number');
            $table->string('between_street')->nullable();
            $table->text('street_references')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->double('default')->default(false);
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
        Schema::dropIfExists('addresses');
    }
}
