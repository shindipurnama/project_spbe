<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateROLESTable extends Migration
{
    public function up()
    {
        Schema::create('ROLES', function (Blueprint $table) {

        $table->id('ID');
		$table->char('ROLE_ID',5);
		$table->string('ROLE',20);
		$table->integer('ATTRIBUTE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');
		

        });
    }

    public function down()
    {
        Schema::dropIfExists('ROLES');
    }
}
