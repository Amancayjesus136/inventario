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
        Schema::dropIfExists('roles');

        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_role');
            $table->string('role')->unique();
            $table->boolean('acceso_admin')->default(false);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['role' => 'Administrador', 'acceso_admin' => true],
            ['role' => 'Socio', 'acceso_admin' => true],
            ['role' => 'Operario', 'acceso_admin' => true],
            ['role' => 'Visitante', 'acceso_admin' => false],
            ['role' => 'Cliente', 'acceso_admin' => false],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
