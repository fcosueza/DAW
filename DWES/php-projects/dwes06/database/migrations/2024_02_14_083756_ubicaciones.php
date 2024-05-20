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
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id(); //Necesario para el ORM Eloquent
            $table->string('nombre',50);
            $table->text('descripcion');
            $table->set('dias',['L','M','X','J','V','S','D']);
            $table->timestamps(); //Necesario para el ORM Eloquent
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};
