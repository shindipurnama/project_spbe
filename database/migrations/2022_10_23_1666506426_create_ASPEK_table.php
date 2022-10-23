<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateASPEKTable extends Migration
{
    public function up()
    {
        Schema::create('ASPEK', function (Blueprint $table) {

		$table->id('ID');
		$table->char('ASPEK_ID',6);
		$table->string('ASPEK_NAME',100);
		$table->integer('INTATTRIBUTE1',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');

        });
    }

    public function down()
    {
        Schema::dropIfExists('ASPEK');
    }
}
