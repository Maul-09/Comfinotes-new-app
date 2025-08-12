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
    Schema::create('transaction', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('departemen_id')->nullable()->constrained('departemens')->onDelete('set null');;
        $table->decimal('amount', 11, 2)->default(0);
        $table->decimal('approval_amount', 11, 2)->nullable();

        $table->string('nama_acara');
        $table->text('catatan_detail')->nullable();
        $table->enum('payment_method', ['tunai', 'transfer'])->default('tunai');
        $table->string('bank_name')->nullable();
        $table->string('bank_account')->nullable();
        $table->string('supporting_file')->nullable();
        $table->enum('status', ['pending', 'rejected', 'approved'])->default('pending');
        $table->date('submission_date');
        $table->date('date_last');
        $table->integer('day');
        $table->boolean('is_read')->default(false);

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
