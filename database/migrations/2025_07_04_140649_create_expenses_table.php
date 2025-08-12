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
        Schema::dropIfExists('expenses');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('departemen_id')->nullable()->constrained('departemens')->nullOnDelete();
            $table->decimal('amount', 11, 2);
            $table->string('kategori')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
};
