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
        Schema::create('pembangunan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggaran_id')->references('id')->on('anggaran')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->text('description');
            $table->integer('amount');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembangunan');
    }
};
