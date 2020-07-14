<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Admin User',
            'email' => 'admin@jobindustries.test',
            'password' => Hash::make('password'),
        ]);
        // Populate industries
        factory(App\Industry::class, 5)->create();

        // Populate users
        factory(App\User::class, 200)->create();

        // Get all the industries attaching up to 3 random industries to each user
        $industries = App\Industry::all();

        // Populate the pivot table
        App\User::all()->each(function ($user) use ($industries) {
            $user->industries()->attach(
                $industries->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
