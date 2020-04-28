<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Jeff T Landlord',
            'email' => 'landlord@lesary.com',
            'password' => Hash::make('landlord'),
        ]);

        \App\User::create([
            'name' => 'Jill A Tenant',
            'email' => 'tenant@lesary.com',
            'password' => Hash::make('tenant'),
        ]);
    }
}
