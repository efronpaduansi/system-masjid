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
            $table->foreignId('pembangunan_id')->references('id')->on('pembangunan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code', 20);
            $table->string('name', 100);
            $table->text('description');
            $table->string('unit', 10);
            $table->integer('unit_price');
            $table->integer('amount');
            $table->integer('total');
            $table->timestamp('order_date');
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
