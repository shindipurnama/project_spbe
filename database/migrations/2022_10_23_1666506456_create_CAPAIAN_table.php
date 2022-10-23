<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCAPAIANTable extends Migration
{
    public function up()
    {
        Schema::create('CAPAIAN', function (Blueprint $table) {

		$table->char('SPBE_ID',10);
		$table->char('PENILAIAN_ID',6);
		$table->integer('JUMLAH_CAPAIAN',);
		$table->char('JUMLAH_KIRTERIA',10);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');
		$table->primary(['SPBE_ID','PENILAIAN_ID']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('CAPAIAN');
    }
}