<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateINDIKATORTable extends Migration
{
    public function up()
    {
        Schema::create('INDIKATOR', function (Blueprint $table) {

        $table->id('ID');
		$table->char('INDIKATOR_ID',15);
		$table->string('INDIKATOR_NAME');
		$table->integer('INT_ATTRIBUTE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');


        });
    }

    public function down()
    {
        Schema::dropIfExists('INDIKATOR');
    }
}
