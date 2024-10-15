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
        Schema::create('hojas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_hoja');
            $table->date('fecha_hoja');
            $table->string('sede');
            $table->string('ubicacion');
            $table->string('marca');
            $table->string('referencia');
            $table->string('notas')->nullable();
            $table->string('preventivo1')->nullable();
            $table->string('preventivo2')->nullable();
            $table->string('preventivo3')->nullable();
            $table->string('preventivo4')->nullable();
            $table->string('preventivo5')->nullable();
            $table->string('preventivo6')->nullable();
            $table->string('preventivo7')->nullable();
            $table->string('preventivo8')->nullable();
            $table->string('correctivo1')->nullable();
            $table->string('correctivo2')->nullable();
            $table->string('correctivo3')->nullable();
            $table->string('correctivo4')->nullable();
            $table->string('correctivo5')->nullable();
            $table->string('correctivo6')->nullable();
            $table->string('correctivo7')->nullable();
            $table->string('correctivo8')->nullable();
            $table->string('preventivo_fecha1')->nullable();
            $table->string('preventivo_fecha2')->nullable();
            $table->string('preventivo_fecha3')->nullable();
            $table->string('preventivo_fecha4')->nullable();
            $table->string('preventivo_fecha5')->nullable();
            $table->string('preventivo_fecha6')->nullable();
            $table->string('preventivo_fecha7')->nullable();
            $table->string('preventivo_fecha8')->nullable();
            $table->string('correctivo_fecha1')->nullable();
            $table->string('correctivo_fecha2')->nullable();
            $table->string('correctivo_fecha3')->nullable();
            $table->string('correctivo_fecha4')->nullable();
            $table->string('correctivo_fecha5')->nullable();
            $table->string('correctivo_fecha6')->nullable();
            $table->string('correctivo_fecha7')->nullable();
            $table->string('correctivo_fecha8')->nullable();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hojas');
    }
};
