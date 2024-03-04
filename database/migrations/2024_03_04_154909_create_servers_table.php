<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('location');
            $table->string('cpu');
            $table->string('ram');
            $table->string('hdd');
            $table->string('oc');
            $table->string('panel');
            $table->string('ip');
            $table->string('user_name');
            $table->string('user_pass');
            $table->dateTime('rental_until');
            $table->integer('price_month');
            $table->integer('price_hour');
            $table->string('status');
            $table->string('id_tenant')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
