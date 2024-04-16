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
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
            $table->string('cpu');
            $table->string('ram');
            $table->string('ssd');
            $table->string('oc')->nullable();
            $table->string('panel')->nullable();
            $table->string('ip');
            $table->string('user_name');
            $table->string('user_pass');
            $table->dateTime('rental_until')->nullable();
            $table->integer('price_month');
            $table->integer('price_hour');
            $table->string('status');
            $table->string('type')->nullable();
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
