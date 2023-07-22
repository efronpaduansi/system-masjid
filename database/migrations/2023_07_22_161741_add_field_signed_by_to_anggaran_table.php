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
        Schema::table('anggaran', function (Blueprint $table) {
            $table->unsignedBigInteger('signed_by')->nullable(false)->after('date');
            $table->foreign('signed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggaran', function (Blueprint $table) {
            $table->dropForeign(['signed_by']);
            $table->dropColumn('signed_by');
        });
    }
};
