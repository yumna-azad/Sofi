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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            
            $table->foreignId('category_id') // Foreign key to categories table
                  ->constrained('categories')
                  ->cascadeOnDelete(); // Cascade delete on category removal
            
            $table->string('name'); // Required field for product name
            $table->string('slug')->unique(); // Unique slug for URL or identifier
            $table->json('images')->nullable(); // JSON column for storing image paths or URLs
            
            $table->longText('description')->nullable(); // Nullable long text field for product description
            
            $table->decimal('price', 10, 2); // Decimal field for price with 10 digits total and 2 decimal places
            
            $table->boolean('is_active')->default(true); // Default value for active status
            $table->boolean('is_featured')->default(false); // Default value for featured status
            $table->boolean('in_stock')->default(true); // Default value for stock availability
            $table->boolean('on_sale')->default(false); // Default value for sale status
            
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Drop the products table if it exists
    }
};
