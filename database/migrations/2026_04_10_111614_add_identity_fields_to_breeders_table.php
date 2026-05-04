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
            $table->string('signature_photo')->nullable()->after('id_photo');
            $table->date('id_issued_date')->nullable()->after('signature_photo');
            $table->date('id_expiration_date')->nullable()->after('id_issued_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breeders', function (Blueprint $table) {
            $table->dropColumn(['signature_photo', 'id_issued_date', 'id_expiration_date']);
        });
    }
};
