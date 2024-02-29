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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->dateTime('fecha_realizacion');
            $table->text('nota')->nullable();
            $table->text('direccion');
            $table->string('nombre_destinatario');
            $table->string('horario_entrega');
            $table->dateTime('fecha_entrega');

            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('cesta_id')->nullable();
            $table->unsignedBigInteger('cesta_personal_id')->nullable();
            
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null'); //Si se borra un usuario se borran sus pedidos
            $table->foreign('cesta_id')->references('id')->on('cestas');
            $table->foreign('cesta_personal_id')->references('id')->on('cestas_personal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
