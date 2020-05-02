<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_tenancies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals');

            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id')->references('id')->on('users');

            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('users');

            $table->dateTime('signed_at')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();

            $table->string('rent_periodicity');
            $table->string('deposit_paid_at')->nullable();

            $table->double('rent_deposit');
            $table->double('rent_monthly');
            $table->double('application_fees');
            $table->double('late_payment_fees');
            $table->string('late_payment_after');
            $table->string('late_payment_periodicity');

            $table->timestamps();
        });


        Schema::table('rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('current_tenancy_id')->nullable();
            $table->foreign('current_tenancy_id')->references('id')->on('rental_tenancies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('current_tenancy_id');
        });

        Schema::dropIfExists('rental_tenancies');
    }
}
