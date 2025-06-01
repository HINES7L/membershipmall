<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePointsDefaultInUsersTable extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->integer('points')->default(0)->change();
    });
}


public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->integer('points')->default(null)->change();
    });
}

}
