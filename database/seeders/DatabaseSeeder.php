<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(Faker $faker): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Admin::create([
            'name' => $faker->name(),
            'email' => 'admin@tersea.com',
            'password' => Hash::make('tersea'),
        ]);

        Status::factory()
            ->count(3)
            ->state(new Sequence(
                ['name' => 'En attente' ],
                ['name' => 'Valider' ],
                ['name' => 'Annuler' ],
            ))
            ->create();
    }
}
