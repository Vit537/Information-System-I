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
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id();
            // Relaciones
            $table->unsignedBigInteger('administrador_id');
            $table->unsignedBigInteger('proveedor_id');

            // Otros campos que quieras agregar
            $table->date('fecha');
            // $table->decimal('total', 10, 2)->nullable();

            $table->timestamps();

            // Claves foráneas
            $table->foreign('administrador_id')->references('id')->on('persona')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('persona_id')->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_compras');
    }
};
