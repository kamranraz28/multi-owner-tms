<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('organization_id')->constrained();
            $table->foreignId('plan_id')->constrained();
            $table->decimal('amount', 10, 2);
            $table->string('payment_method'); // bkash, nagad, bank
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->json('billing_data')->nullable();
            $table->text('admin_note')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
