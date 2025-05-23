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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->unique();
            $table->string('imagen')->nullable();
            $table->decimal('precio',10,2);
            $table->unsignedInteger('stock')->nullable();
            $table->unsignedInteger('stock_minimo')->nullable();
            $table->foreignId('categoria_id')->nullable()->constrained('categoria')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};


// para migrar una sola tabla
// php artisan migrate:refresh --path=database\migrations\2025_05_05_012609_create_producto_table.php
