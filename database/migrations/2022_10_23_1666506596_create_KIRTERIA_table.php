<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKIRTERIATable extends Migration
{
    public function up()
    {
        Schema::create('KIRTERIA', function (Blueprint $table) {

        $table->id('ID');
		$table->char('KIRTERIA_ID',10);
		$table->char('SPBE_ID',10);
		$table->string('KIRTERIA');
		$table->integer('INT_ATTRIBUTE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');
        });
    }

    public function down()
    {
        Schema::dropIfExists('KIRTERIA');
    }
}
