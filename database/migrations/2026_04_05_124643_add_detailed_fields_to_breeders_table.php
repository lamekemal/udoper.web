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
            $table->renameColumn('name', 'first_name');
            $table->string('last_name')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->renameColumn('phone', 'contact');
            $table->dropColumn('address');
            $table->string('neighborhood')->nullable();
            $table->string('borough')->nullable();
            $table->string('city')->nullable();
            $table->string('geographic_location')->nullable();
            $table->renameColumn('membership_number', 'breeder_number');
            $table->date('date_of_membership')->nullable();
            $table->date('date_of_registration')->nullable();
            $table->string('organization')->nullable();
            $table->string('id_photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breeders', function (Blueprint $table) {
            $table->renameColumn('first_name', 'name');
            $table->dropColumn(['last_name', 'place_of_birth', 'neighborhood', 'borough', 'city', 'geographic_location', 'date_of_membership', 'date_of_registration', 'organization', 'id_photo']);
            $table->renameColumn('contact', 'phone');
            $table->text('address')->nullable();
            $table->renameColumn('breeder_number', 'membership_number');
        });
    }
};
