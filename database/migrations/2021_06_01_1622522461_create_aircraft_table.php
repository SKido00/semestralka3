<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aircrafts', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('acType',50)->nullable()->default('NULL');
            $table->string('acWakeTurb',50)->nullable()->default('NULL');
            $table->string('acName',50)->nullable()->default('NULL');
            $table->primary('id');

        });

    }

    public function down()
    {
        Schema::dropIfExists('aircraft');
    }
};
