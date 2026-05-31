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
        Schema::table('breeders', function (Blueprint $table) {
            $table->foreignId('savedby')->nullable()->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breeders', function (Blueprint $table) {
            $table->dropForeignKeyIfExists(['savedby_foreign']);
            $table->dropColumn('savedby');
        });
    }
};
