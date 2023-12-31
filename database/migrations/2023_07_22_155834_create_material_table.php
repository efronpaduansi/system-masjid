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
        Schema::create('material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembangunan_id');
            $table->foreign('pembangunan_id')->references('id')->on('pembangunan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code', 50);
            $table->string('name', 128);
            $table->string('description', 256);
            $table->string('unit', 50);
            $table->integer('unit_price');
            $table->integer('amount');
            $table->integer('total');
            $table->date('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
