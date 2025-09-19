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
        Schema::create('detalle_videos', function (Blueprint $table) {
            $table->id();
            $table->string('duracion', 50)->nullable();
            $table->timestamp('fecha_publicacion');
            $table->enum('extencion', ['.mp4', '.mov', '.wmv']);
            $table->string('dimensiones', 100)->nullable();
            $table->unsignedBigInteger('cantidad_visitas');
            $table->double('ganancia_generada');

            $table->foreignId('video_id')->constrained('videos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_videos');
    }
};
