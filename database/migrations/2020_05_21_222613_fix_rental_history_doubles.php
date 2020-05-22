<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixRentalHistoryDoubles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rental_application_rental_histories', function(Blueprint $table) {
            $table->double('new_rent_monthly')->default(0.00);
        });
        foreach(\App\RentalApplicationRentalHistory::all() as $rh) {
            $rh->new_rent_monthly = floatval($rh->rent_monthly);
            $rh->save();
        }
        Schema::table('rental_application_rental_histories', function(Blueprint $table) {
            $table->dropColumn('rent_monthly');
            $table->renameColumn('new_rent_monthly', 'rent_monthly');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rental_application_rental_histories', function(Blueprint $table) {
            $table->string('new_rent_monthly')->default('');
        });
        foreach(\App\RentalApplicationRentalHistory::all() as $rh) {
            $rh->new_rent_monthly = floatval($rh->rent_monthly);
            $rh->save();
        }
        Schema::table('rental_application_rental_histories', function(Blueprint $table) {
            $table->dropColumn('rent_monthly');
            $table->renameColumn('new_rent_monthly', 'rent_monthly');
        });
    }
}
