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
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('price');
            $table->integer('stock');
            $table->string('image');
            
            $table->foreignId('gender_category_id')->constrained(
                table: 'gender_categories',
                indexName: 'products_gender_category_id'
            );
            $table->foreignId('type_category_id')->constrained(
                table: 'type_categories',
                indexName: 'products_type_category_id'
            );
            $table->foreignId('age_category_id')->constrained(
                table: 'age_categories',
                indexName: 'products_age_category_id'
            );
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
