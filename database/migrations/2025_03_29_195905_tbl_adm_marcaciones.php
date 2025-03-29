<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_adm_marcaciones', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion');
            $table->string('marca');
            $table->time('hora')->default(Carbon::now()->format('H:i:s'));
            $table->date('fecha')->default(Carbon::now()->format('Y-m-d'));
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
