<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHASILTable extends Migration
{
    public function up()
    {
        Schema::create('HASIL', function (Blueprint $table) {

		$table->char('USER_ID',6);
		$table->char('PENILAIAN_ID',6);
		$table->integer('TOTAL_SCORE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');
		$table->primary(['USER_ID','PENILAIAN_ID']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('HASIL');
    }
}
