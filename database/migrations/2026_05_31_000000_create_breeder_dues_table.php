<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('breeder_dues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('breeder_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->integer('amount');
            $table->date('payment_date');
            $table->date('valid_until');
            $table->string('reference')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['type', 'valid_until']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('breeder_dues');
    }
};
