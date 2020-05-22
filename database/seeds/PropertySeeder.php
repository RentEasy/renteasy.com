<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // https://github.com/emanhamed/Houses-dataset

        $datasetDir = config('app.seed_directory');
        $possiblePhotos = ['_frontal.jpg', '_kitchen.jpg', '_bedroom.jpg', '_bathroom.jpg'];

        $properties = explode(PHP_EOL, file_get_contents("$datasetDir/HousesInfo.txt"));
        foreach ($properties as $i => $property) {
            if ($property == '') {
                continue;
            }
            $photoId = $i + 1;

            list($bedrooms, $bathrooms, $sqft, $zipcode, $price) = explode(' ', $property);

            $property = \App\Property::create([
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'zipcode' => $zipcode,
                'bedrooms' => $bedrooms,
                'bathrooms' => $bathrooms,
                'sqft' => $sqft,
            ]);

            $rental = \App\Rental::create([
                'property_id' => $property->id,
                'landlord_id' => 1,
                'sqft' => $sqft,
                'bedrooms' => $bedrooms,
                'bathrooms' => $bathrooms,
                'rent_deposit' => $price / 400,
                'rent_monthly' => $price / 500,
                'listing_date' => new DateTime()
            ]);

            foreach ($possiblePhotos as $pi => $photo) {
                $photo = $photoId . $photo;

                Storage::put("public/rentals/{$rental->id}/$photo", file_get_contents("$datasetDir/$photo"));

                \App\RentalPhoto::create([
                    'rental_id' => $rental->id,
                    'name' => $photo,
                    'filename' => "rentals/{$rental->id}/$photo",
                    'order' => $pi
                ]);
            }
        }
    }

    // https://stackoverflow.com/questions/7620550/generate-random-coordinates-around-a-location
    public function generateRandomPoint($centre, $radius)
    {
        $radius_earth = 3959; //miles

        //Pick random distance within $distance;
        $distance = lcg_value() * $radius;

        //Convert degrees to radians.
        $centre_rads = array_map('deg2rad', $centre);

        //First suppose our point is the north pole.
        //Find a random point $distance miles away
        $lat_rads = (pi() / 2) - $distance / $radius_earth;
        $lng_rads = lcg_value() * 2 * pi();


        //($lat_rads,$lng_rads) is a point on the circle which is
        //$distance miles from the north pole. Convert to Cartesian
        $x1 = cos($lat_rads) * sin($lng_rads);
        $y1 = cos($lat_rads) * cos($lng_rads);
        $z1 = sin($lat_rads);


        //Rotate that sphere so that the north pole is now at $centre.

        //Rotate in x axis by $rot = (pi()/2) - $centre_rads[0];
        $rot = (pi() / 2) - $centre_rads[0];
        $x2 = $x1;
        $y2 = $y1 * cos($rot) + $z1 * sin($rot);
        $z2 = -$y1 * sin($rot) + $z1 * cos($rot);

        //Rotate in z axis by $rot = $centre_rads[1]
        $rot = $centre_rads[1];
        $x3 = $x2 * cos($rot) + $y2 * sin($rot);
        $y3 = -$x2 * sin($rot) + $y2 * cos($rot);
        $z3 = $z2;


        //Finally convert this point to polar co-ords
        $lng_rads = atan2($x3, $y3);
        $lat_rads = asin($z3);

        return array_map('rad2deg', array($lat_rads, $lng_rads));
    }
}
