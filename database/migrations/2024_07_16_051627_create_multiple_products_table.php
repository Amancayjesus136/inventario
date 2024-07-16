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
        Schema::create('multiple_products', function (Blueprint $table) {
            $table->id('id_multiple_products');
            $table->string('size_product_multiple');
            $table->decimal('price_product_multiple', 10, 2);
            $table->text('discount_product_multiple');
            $table->string('user_created_product_multiple');
            $table->string('user_updated_product_multiple');
            $table->date('date_created_product_multiple');
            $table->date('date_updated_product_multiple');
            $table->integer('status_product_multiple');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multiple_products');
    }
};
