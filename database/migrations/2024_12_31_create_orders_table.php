<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->decimal('grand_total', 10, 2);
                $table->string('status')->default('new');
                $table->string('payment_status')->default('pending');
                $table->string('payment_method');
                $table->string('currency')->default('usd');
                $table->decimal('shipping_amount', 10, 2)->default(0);
                $table->string('shipping_method')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}; 