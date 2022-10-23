<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePREMISSIONTable extends Migration
{
    public function up()
    {
        Schema::create('PREMISSION', function (Blueprint $table) {

        $table->char('ROLE_ID',5);
		$table->char('USER_ID',6);
		$table->datetime('CREATED_AT');
		$table->datetime('UPDATED_AT');
		$table->datetime('DELETED_AT');
		$table->primary(['ROLE_ID','USER_ID']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('PREMISSION');
    }
}