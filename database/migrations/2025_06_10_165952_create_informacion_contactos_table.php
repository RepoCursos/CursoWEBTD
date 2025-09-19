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
        Schema::create('informacion_contactos', function (Blueprint $table) {
            $table->id();
            $table->string('telefono', 50)->unique();
            $table->string('email', 50)->nullable()->unique();

            $table->foreignId('plataforma_id')->constrained('plataformas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_contactos');
    }
};
