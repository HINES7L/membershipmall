<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('point_exchanges', function (Blueprint $table) {
        $table->string('coupon_code', 50)->nullable()->after('points');
    });
}

public function down()
{
    Schema::table('point_exchanges', function (Blueprint $table) {
        $table->dropColumn('coupon_code');
    });
}

};
