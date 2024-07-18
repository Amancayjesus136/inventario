<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->string('name_mesa');
            $table->string('nombres_clientes')->nullable();
            $table->string('metodo_pago');
            $table->date('fecha_factura');
            $table->string('user_created_product');
            $table->string('user_updated_product');
            $table->timestamp('date_created_product')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_updated_product')->nullable()->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->integer('status_factura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
