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
        Schema::create('configuracion_alertas', function (Blueprint $table) {
            $table->foreignId('persona_id')->primary()->constrained('persona')->onDelete('cascade');
            $table->boolean('notificar_venta')->default(true);
            $table->boolean('notificar_producto')->default(true);
            $table->boolean('notificar_categoria')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracion_alertas');
    }
};
