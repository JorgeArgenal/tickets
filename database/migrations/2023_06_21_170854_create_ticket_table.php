<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('idTicket');
            $table->timestamp('fechaCreacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('Region', 50);
            $table->string('Oficina', 50);
            $table->string('Usuario', 50);
            $table->string('idEquipo', 20)->nullable();
            $table->string('TipoEquipo', 50);
            $table->string('Marca', 50);
            $table->string('Modelo', 50);
            $table->string('NoSerie', 50)->nullable();
            $table->string('Color', 30);
            $table->string('Caracteristicas', 100)->nullable();
            $table->date('FechaEnvio');
            $table->text('Problema');
            $table->string('estado', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
