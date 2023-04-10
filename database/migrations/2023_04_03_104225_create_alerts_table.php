<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
        $table->increments('ID');
        $table->integer('METER_NO');
        $table->string('MA_DDO');
        $table->string('TEN_KHANG');
        $table->string('DIA_CHI');
        $table->string('DON_VI');
        $table->dateTime('ALERT_TIME');
        $table->boolean('STT')->default(false);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alerts');
    }
};
