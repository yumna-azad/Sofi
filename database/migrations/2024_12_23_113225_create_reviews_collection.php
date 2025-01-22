<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsCollection extends Migration
{
    public function up()
    {
        Schema::connection('mongodb')->create('reviews', function (Blueprint $collection) {
            $collection->id();
            $collection->foreignId('user_id');
            $collection->foreignId('product_id');
            $collection->integer('rating');
            $collection->string('comment');
            $collection->timestamps();
            
            // Create indexes for better query performance
            $collection->index(['user_id', 'product_id']);
            $collection->index('rating');
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('reviews');
    }
}
