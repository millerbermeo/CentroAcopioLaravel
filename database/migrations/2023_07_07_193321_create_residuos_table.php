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
        Schema::create('residuos', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->string('nombre_residuo');
            $table->enum('tipo_residuo', ['Aprovechables', 'NoAprovechables', 'Quimicos', 'Infecciosos','Otros']);
            $table->integer('cantidad_residuo');
            $table->string('descripcion_residuo');
            $table->enum('deposito', ['DepositoA', 'DepositoB', 'DepositoC']);
            // $table->enum('area', ['AreaA', 'AreaB', 'AreaC']);
            $table->enum('area', ['ENNCC', 'ComplejoDeportivo', 'Gastronomia', 'Agroindustria', 'Laboratorios', 'Sennova', 'AreasComunes', 'Enfermeria']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residuos');
    }
};
