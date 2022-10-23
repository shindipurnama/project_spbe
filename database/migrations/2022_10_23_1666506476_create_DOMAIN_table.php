<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDOMAINTable extends Migration
{
    public function up()
    {
        Schema::create('DOMAIN', function (Blueprint $table) {

        $table->id('ID');
		$table->char('DOMAIN_ID',5);
		$table->string('NAMA_DOMAIN');
		$table->integer('INTATTRIBUTE',);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');


        });
    }

    public function down()
    {
        Schema::dropIfExists('DOMAIN');
    }
}
