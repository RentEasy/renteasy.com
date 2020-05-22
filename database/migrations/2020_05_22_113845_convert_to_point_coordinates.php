<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MStaack\LaravelPostgis\Geometries\Point;


class ConvertToPointCoordinates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->point('new_coordinates')->nullable();
        });

        foreach(\DB::table('properties')->get() as $p) {
            list($lat, $lon) = $this->latLon($p->coordinates);
            $point = new Point($lat, $lon);
            \DB::table('properties')
                ->where('id', $p->id)
                ->update(['new_coordinates' => $point->toWKT()]);
        }
        Schema::table('properties', function(Blueprint $table) {
            $table->dropColumn('coordinates');
            $table->renameColumn('new_coordinates', 'coordinates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }

    private function latLon($coords)
    {
        $re = '/\((-*\d.+),[\s](-*\d.+)\)/m';

        preg_match($re, $coords, $matches);
        return [$matches[1], $matches[2]];
    }
}
