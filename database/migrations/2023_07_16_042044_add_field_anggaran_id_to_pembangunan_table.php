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
        Schema::table('pembangunan', function (Blueprint $table) {
            $table->foreignId('anggaran_id')->after('id')->constrained('anggaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembangunan', function (Blueprint $table) {
            $table->dropForeign(['anggaran_id']);
        });
    }
};
