<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAqisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('aqis', function (Blueprint $table) {
                $table->id();
                $table->char('SiteName', 10);
                $table->char('County', 5);
                $table->string('AQI');
                //$table->string('Pollutant');
                $table->char('Status', 5);
                $table->string('SO2');
                $table->string('CO');
                //$table->integer('CO_8hr');
                //$table->integer('O3');
                //$table->integer('O3_8hr');
                //$table->integer('PM10');
                $table->string('PM25_AVG')->nullable();;
                $table->string('PM10_AVG');
                //$table->float('NO2');
                //$table->float('NOx');
                //$table->float('NO');
                $table->string('WindSpeed');
                $table->string('WindDirec');
                //$table->integer('SO2_AVG');
                $table->integer('SiteId');
                $table->double('Latitude', 15, 8);    
                $table->double('Longitude', 15, 8);
                $table->dateTime('PublishTime');
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
        Schema::dropIfExists('aqis');
    }
}
