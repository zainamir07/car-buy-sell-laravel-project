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
        Schema::create('car_features', function (Blueprint $table) {
            $table->id('feature_id');
            $table->string('feature_list_id');
            $table->boolean('abs')->nullable();
            $table->boolean('airBags')->nullable();
            $table->boolean('airConditioning')->nullable();
            $table->boolean('alloyRims')->nullable();
            $table->boolean('fmRadio')->nullable();
            $table->boolean('cdPlayer')->nullable();
            $table->boolean('cassettePlayer')->nullable();
            $table->boolean('coolBox')->nullable();
            $table->boolean('cruiseControl')->nullable();
            $table->boolean('climateControl')->nullable();
            $table->boolean('dvdPlayer')->nullable();
            $table->boolean('frontSpeakers')->nullable();
            $table->boolean('frontCamera')->nullable();
            $table->boolean('heatedSeats')->nullable();
            $table->boolean('immobilizerKey')->nullable();
            $table->boolean('keylessEntry')->nullable();
            $table->boolean('navigationSystem')->nullable();
            $table->boolean('powerLocks')->nullable();
            $table->boolean('powerMirrors')->nullable();
            $table->boolean('powerSteering')->nullable();
            $table->boolean('powerWindows')->nullable();
            $table->boolean('rearSeatEntertainment')->nullable();
            $table->boolean('rearAcVents')->nullable();
            $table->boolean('rearSpeakers')->nullable();
            $table->boolean('rearCamera')->nullable();
            $table->boolean('sunRoof')->nullable();
            $table->boolean('steeringSwitches')->nullable();
            $table->boolean('USBCable')->nullable();
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
        Schema::dropIfExists('car_features');
    }
};
