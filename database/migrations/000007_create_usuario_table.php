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
        Schema::create('usuario', function (Blueprint $table) {
           // $table->id();
            $table->foreignId('persona_id')->primary()->constrained('persona')->onDelete('cascade');
            $table->string('departamento');
            $table->date('fecha_contrato');
            $table->date('fecha_despido')->nullable();
            $table->decimal('sueldo',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
