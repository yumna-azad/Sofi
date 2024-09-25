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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // Foreign key reference to 'users' table
            $table->decimal('grand_total', 10, 2)->nullable(); // Grand total of the order
            $table->string('payment_method')->nullable(); // Payment method (e.g., card, PayPal)
            $table->string('payment_status')->nullable(); // Status of payment (e.g., pending, completed)
            $table->enum('status', ['new', 'processing', 'shipped', 'delivered', 'canceled'])->default('new'); // Order status
            $table->string('currency')->nullable(); // Currency used for the order (e.g., USD, EUR)
            $table->decimal('shipping_amount', 10, 2)->nullable(); // Shipping charges
            $table->string('shipping_method')->nullable(); // Method used for shipping
            $table->text('notes')->nullable(); // Additional notes for the order
            $table->timestamps(); // Automatically adds created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};