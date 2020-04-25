<?php

use App\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('coordinates')->nullable();
            $table->double('bedrooms')->nullable();
            $table->double('bathrooms')->nullable();

            $table->string('parcel')->nullable();
            $table->string('use_code')->nullable();
            $table->integer('year_built')->nullable();

            $table->integer('sqft')->nullable();
            $table->integer('lot_sqft')->nullable();

            $table->integer('stories')->nullable();
            $table->integer('total_rooms')->nullable();
            $table->boolean('basement')->nullable();
            $table->boolean('storm_shelter')->nullable();
            $table->boolean('exterior_finish')->nullable();
            $table->boolean('roof_type')->nullable();

            $table->timestamps();
        });
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties');

            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id')->references('id')->on('users');

            $table->string('unit')->nullable();
            $table->integer('sqft')->nullable();
            $table->double('bedrooms')->nullable();
            $table->double('bathrooms')->nullable();
            $table->integer('stories')->nullable();

            $table->double('rent_deposit');
            $table->double('rent_monthly');

            $table->timestamp('listing_date');

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
        Schema::dropIfExists('rentals');
        Schema::dropIfExists('properties');
    }
}
