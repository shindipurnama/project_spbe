<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUSERSTable extends Migration
{
    public function up()
    {
        Schema::create('USERS', function (Blueprint $table) {

        $table->id('ID');
		$table->char('USER_ID',6);
		$table->string('USERNAME',15);
		$table->string('NAMA',100);
		$table->char('PASSWORD',10);
		$table->date('TANGGAL_LAHIR');


        });
    }

    public function down()
    {
        Schema::dropIfExists('USERS');
    }
}
