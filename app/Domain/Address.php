<?php


namespace App\Domain;


class Address
{

    public string $address;
    public string $city;
    public string $state;
    public string $zipCode;
    public string $country;

    public static function makeFromPlaid(\stdClass $input) : Address {
        $address = new Address();

        $address->address = $input->street;
        $address->city = $input->city;
        $address->state = $input->region;
        $address->zipCode = $input->postal_code;
        $address->country = $input->country;

        return $address;
    }

}
