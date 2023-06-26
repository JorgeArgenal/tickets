<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateActualizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualizaciones', function (Blueprint $table) {
            $table->increments('idActualizacion');
            $table->integer('idTicket')->unsigned();
            $table->timestamp('fechaActualizacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->text('descripcion');
            $table->text('imagenAdjunta');
            $table->foreign('idTicket')->references('idTicket')->on('ticket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actualizaciones');
    }
}
