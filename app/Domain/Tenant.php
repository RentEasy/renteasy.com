<?php declare(strict_types = 1);


namespace App\Domain;


class Tenant
{

    public string $firstName;
    public string $middleName;
    public string $lastName;

    public array $addresses;

    public static function makeFromPlaid(\stdClass $accounts) : Tenant
    {



    }


}
