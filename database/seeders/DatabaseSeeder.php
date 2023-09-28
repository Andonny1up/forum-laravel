<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create(['email'=> 'admin@app.com']);
        \App\Models\User::factory(9)->create();

        \App\Models\Category::factory(10)->hasThreads(20)->create();
    }
}
