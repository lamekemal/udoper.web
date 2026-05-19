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
            $table->string('gender')->nullable()->after('id_expiration_date');
            $table->string('marital_status')->nullable()->after('gender');
            $table->string('department')->nullable()->after('marital_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breeders', function (Blueprint $table) {
            $table->dropColumn(['gender', 'marital_status', 'department']);
        });
    }
};
