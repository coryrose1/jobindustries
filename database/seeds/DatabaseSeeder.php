<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Populate industries
        factory(App\Industry::class, 20)->create();

        // Populate users
        factory(App\User::class, 50)->create();

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
