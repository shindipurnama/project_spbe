<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePENJADWALANTable extends Migration
{
    public function up()
    {
        Schema::create('PENJADWALAN', function (Blueprint $table) {

        $table->id('ID');
		$table->char('PENJADWALAN_ID',4);
		$table->date('START_DATE');
		$table->date('END_DATE');
		$table->integer('ATTRIBUTE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');


        });
    }

    public function down()
    {
        Schema::dropIfExists('PENJADWALAN');
    }
}
