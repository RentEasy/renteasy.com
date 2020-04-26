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

            foreach($possiblePhotos as $pi => $photo) {
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
}
