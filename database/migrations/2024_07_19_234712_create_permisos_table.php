
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear la tabla de permisos y agregar datos predeterminados.
     */
    public function up(): void
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id('idPermiso');
            $table->string('grupo');
            $table->string('permiso');
            $table->timestamps();
        });

        DB::table('permisos')->insert([
            ['grupo' => 'Facturas', 'permiso' => 'Registrar facturas'],
            ['grupo' => 'Facturas', 'permiso' => 'Ver facturas'],
            ['grupo' => 'Facturas', 'permiso' => 'Imprimir facturas'],
            ['grupo' => 'Facturas', 'permiso' => 'Editar facturas'],
            ['grupo' => 'Facturas', 'permiso' => 'Cancelar factura'],
            ['grupo' => 'Facturas', 'permiso' => 'Desactivar factura'],
            ['grupo' => 'Facturas', 'permiso' => 'Activar factura'],
            ['grupo' => 'Facturas', 'permiso' => 'Exportar facturas'],
            ['grupo' => 'Facturas', 'permiso' => 'Exportar facturas + clientes'],

            ['grupo' => 'Productos', 'permiso' => 'Registrar producto'],
            ['grupo' => 'Productos', 'permiso' => 'Ver producto'],
            ['grupo' => 'Productos', 'permiso' => 'Editar producto'],
            ['grupo' => 'Productos', 'permiso' => 'Desactivar producto'],
            ['grupo' => 'Productos', 'permiso' => 'Activar producto'],
            ['grupo' => 'Productos', 'permiso' => 'Exportar producto'],

            ['grupo' => 'Empleados', 'permiso' => 'Crear empleado'],
            ['grupo' => 'Empleados', 'permiso' => 'Ver empleado'],
            ['grupo' => 'Empleados', 'permiso' => 'Editar empleado'],
            ['grupo' => 'Empleados', 'permiso' => 'Desactivar empleado'],
            ['grupo' => 'Empleados', 'permiso' => 'Activar empleado'],
            ['grupo' => 'Empleados', 'permiso' => 'Exportar empleado'],

            ['grupo' => 'Clientes', 'permiso' => 'Editar clientes'],
            ['grupo' => 'Clientes', 'permiso' => 'Ver clientes'],
            ['grupo' => 'Clientes', 'permiso' => 'Desactivar clientes'],
            ['grupo' => 'Clientes', 'permiso' => 'Activar clientes'],
            ['grupo' => 'Clientes', 'permiso' => 'Exportar clientes'],
            ['grupo' => 'Clientes', 'permiso' => 'Enviar promociones'],

            ['grupo' => 'Configuración', 'permiso' => 'Crear categorias'],
            ['grupo' => 'Configuración', 'permiso' => 'Editar categorias'],
            ['grupo' => 'Configuración', 'permiso' => 'Ver categorias'],
            ['grupo' => 'Configuración', 'permiso' => 'Desactivar categorias'],
            ['grupo' => 'Configuración', 'permiso' => 'Activar categorias'],
            ['grupo' => 'Configuración', 'permiso' => 'Exportar categorias'],

            ['grupo' => 'Logs', 'permiso' => 'Ver actividad'],
            ['grupo' => 'Logs', 'permiso' => 'Hacer reporte'],
            ['grupo' => 'Logs', 'permiso' => 'Exportar logs'],
            ['grupo' => 'Logs', 'permiso' => 'Buscar logs'],

        ]);
    }

    /**
     * Eliminar la tabla de permisos.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
