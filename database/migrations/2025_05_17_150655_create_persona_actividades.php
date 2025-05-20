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
        Schema::create('persona_actividades', function (Blueprint $table) {
             $table->id();
                $table->foreignId('persona_id')->constrained('persona')->onDelete('cascade');
                $table->string('event_type'); // login, logout, button_click, etc.
                $table->string('event_name'); // nombre descriptivo
                $table->text('metadata')->nullable(); // datos adicionales en JSON
                $table->string('ip_address')->nullable();
                $table->string('user_agent')->nullable();
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_actividades');
    }
};
