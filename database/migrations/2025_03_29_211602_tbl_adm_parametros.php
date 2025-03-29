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
        Schema::create('tbl_adm_parametros', function (Blueprint $table) {
            ['idparametros', 'grupo', 'descripcion', 'valor_min','valor_max', 'estado'];
            $table->id();
            $table->string('grupo');
            $table->string('descripcion');
            $table->string('valor_min');
            $table->string('valor_max');
            $table->string('estado')->default('A');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
