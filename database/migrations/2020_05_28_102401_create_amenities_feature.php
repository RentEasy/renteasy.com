<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        [
            'Air Conditioning' => [
                'None',
                'Window Units',
                'Central Air',
            ],
            'Heating' => [
                'None',
                'Forced Air',
                'Boiler',
            ],
            'Parking' => [
                'On Street',
                'Garage',
                'Parking Garage',
                'Covered Parking',
                'Valet Parking',
            ],
            'Flooring' => [
                'Carpet',
                'Hard Wood',
                'Concrete',
            ],
            'Appliances' => [
                'Microwave',
                'Stove Top',
                'Oven',
                'Dish Washer',
                'Refrigerator',
            ],
            'Laundry' => [
                'Clothes Washer',
                'Clothes Dryer',
                'Communal',
            ],
            'Countertops' => [
                'Granite',
                'Soapstone',
                'Metal',
                'Tile',
                'Concrete',
                'Butcher Block',
            ],
            'Smart Home' => [
                'Electronic Locks',
                'Smart Lights',
                'Smart Thermostat',
                'EV Charging',
            ],
            'Outdoor' => [
                'Deck',
                'Balcony',
                'Porch',
                'Fire Pit'
            ],
            'Accessibility' => [
                'Wheelchair Accessible',
                'Strobing Fire Alarms',
            ]
        ];

        Schema::create('amenity_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->boolean('multiple');

            $table->timestamps();
        });
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('amenity_category_id');
            $table->foreign('amenity_category_id')->references('id')->on('amenity_categories');

            $table->string('name');

            $table->timestamps();
        });
        Schema::create('rental_amenities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('amenity_id');
            $table->foreign('amenity_id')->references('id')->on('amenities');

            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals');

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
        Schema::dropIfExists('amenities_feature');
    }
}
