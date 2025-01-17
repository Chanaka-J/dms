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
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_address');
            $table->string('pickup_name');
            $table->string('pickup_phone');
            $table->string('pickup_email')->nullable();
            $table->string('delivery_address');
            $table->string('delivery_name');
            $table->string('delivery_phone');
            $table->string('delivery_email')->nullable();;
            $table->string('type_of_good');
            $table->string('delivery_provider');
            $table->string('priority');
            $table->date('pickup_date');
            $table->time('delivery_time');
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
        Schema::dropIfExists('delivery');
    }
};
