<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->boolean('status')->default(true);
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('product_code');
            
            $table->longText('short_detail')->nullable();
            $table->longText('long_detail')->nullable();
            $table->string('thumbnail_uri')->nullable();
            $table->string('thumbnail_name')->nullable();
            $table->string('video_uri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
