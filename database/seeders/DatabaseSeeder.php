<?php

namespace Database\Seeders;

use App\Models\Abonne;
use App\Models\Motivation;
use App\Models\Newsletter;
use App\Models\Rubrique;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Region::factory(10)->create();
        Participant::factory(200)->create();
        Election::factory(1)->create();
        Bulletin::factory(5)->create();
        vote::factory(195)->create();
        */
        Newsletter::factory(40)->create();
        Rubrique::factory(40)->create();
        Motivation::factory(40)->create();
        Abonne::factory(200)->create();
    }
}
