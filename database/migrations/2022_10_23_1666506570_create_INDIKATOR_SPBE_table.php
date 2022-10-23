<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateINDIKATORSPBETable extends Migration
{
    public function up()
    {
        Schema::create('INDIKATOR_SPBE', function (Blueprint $table) {

        $table->id('ID');
		$table->char('SPBE_ID',10);
		$table->char('INDIKATOR_ID',15);
		$table->char('DOMAIN_ID',5);
		$table->char('ASPEK_ID',6);
		$table->string('SPBE',50);
		$table->integer('JUMLAH_CAPAIAN',);
		$table->integer('TOTAL',);
		$table->integer('INT_ATTRIBUTE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');


        });
    }

    public function down()
    {
        Schema::dropIfExists('INDIKATOR_SPBE');
    }
}
