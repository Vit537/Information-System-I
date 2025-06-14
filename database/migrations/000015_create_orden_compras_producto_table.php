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
        Schema::create('orden_compras_producto', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('orden_compra_id');
            $table->unsignedBigInteger('producto_id');

            // Puedes agregar campos adicionales como cantidad o precio unitario
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('precio_total', 10, 2);
            $table->timestamps();

            $table->foreign('orden_compra_id')->references('id')->on('orden_compras')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_compras_producto');
    }
};
