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
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('browser');
            $table->datetime('event_time');
            $table->string('event'); // create, update, delete, etc.
         //   $table->string('event_type')->comment('model, auth, system');
            $table->text('description')->nullable();
            $table->string('device');
            $table->morphs('loggable'); // For polymorphic relationship (optional)
            $table->foreignId('persona_id')->nullable()->constrained('persona')->onDelete('cascade');
            $table->timestamps();

    //         $table->index(['event_type', 'event']);
    // $table->index(['loggable_type', 'loggable_id']);
    // $table->index('user_id');
    // usar esto en el caso de que la tabla vaya a tener varios datos para que no
    // se demasiado costoso la busqueda
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora');
    }
};
