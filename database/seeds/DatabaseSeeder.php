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
        factory(App\User::class, 5)->create();
        factory(App\Substance::class, 10)->create();
        factory(App\Medicine::class, 20)->create();

        $substance = App\Substance::all();

        App\Medicine::all()->each(function ($medicine) use ($substance) {
           $medicine->substances()->attach(
               $substance->random(rand(1, 4))->pluck('id')->toArray()
           );
        });

    }
}


