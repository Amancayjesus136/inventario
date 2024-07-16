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
            $table->id('id_product');
            $table->string('name_product');
            $table->string('photo_product');
            $table->integer('category_product');
            $table->string('filtro_product');
            $table->text('description_product');
            $table->string('user_created_product');
            $table->string('user_updated_product');
            $table->date('date_created_product');
            $table->date('date_updated_product');
            $table->integer('status_product');
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
