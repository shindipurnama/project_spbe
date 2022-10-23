<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePENILAIANMANDIRITable extends Migration
{
    public function up()
    {
        Schema::create('PENILAIAN_MANDIRI', function (Blueprint $table) {

        $table->id('ID');
		$table->char('PENILAIAN_ID',6);
		$table->char('PENJADWALAN_ID',4);
		$table->string('PENILAIAN_NAME',50);
		$table->integer('JUMLAH_INDIKATOR',);
		$table->integer('INT_ATRRIBUTE1',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');


        });
    }

    public function down()
    {
        Schema::dropIfExists('PENILAIAN_MANDIRI');
    }
}
