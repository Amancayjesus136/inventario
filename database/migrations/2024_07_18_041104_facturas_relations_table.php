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
        Schema::create('facturas_relations', function (Blueprint $table) {
            $table->id('id_factura_relations');
            $table->integer('id_factura');
            $table->string('name_product_factura');
            $table->decimal('price_product_factura', 10,2);
            $table->decimal('igv_incluido', 10,2);
            $table->string('size_product_factura');
            $table->string('total_factura');
            $table->integer('status_factura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_relations');
    }
};
