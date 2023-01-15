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
        Schema::create('listings', function (Blueprint $table) {
            $table->id('listing_id');
            $table->string('listing_city');
            $table->string('listing_model_year');
            $table->string('listing_company_name');
            $table->string('listing_car_model');
            $table->string('listing_register_province');
            $table->string('listing_car_mileage');
            $table->string('listing_car_price');
            $table->unsignedBigInteger('listing_exterior_color');
            $table->foreign('listing_exterior_color')->references('color_id')->on('colors'); 
            $table->enum('listing_car_category', ['B', 'S', 'R']); 
            $table->string('listing_car_description');
            $table->enum('listing_car_engineType', ['Petrol', 'Diesel', 'LPG', 'CNG', 'Hybrid', 'Electric']);
            $table->string('listing_car_engineCapacity');
            $table->string('listing_slug');
            $table->enum('listing_car_transmission', ['Automatic', 'Manual']);
            $table->enum('listing_car_assembly', ['Local', 'Imported']);
            $table->string('listing_car_contact');
            $table->string('listing_car_whatsApp');
            $table->string('listing_car_authorId');
            $table->boolean('listing_status')->default(1);
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
        Schema::dropIfExists('listings');
    }
};
