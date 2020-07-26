<?php

use App\Models\InputTypes;
use App\Models\Organization;
use App\Models\Questions;
use App\Models\SurveyHeader;
use App\Models\SurveySections;
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
        factory(InputTypes::class, 3)->create();
        factory(Organization::class, 3)->create();
        factory(SurveyHeader::class, 3)->create();
        factory(SurveySections::class, 3)->create();
        factory(Questions::class, 3)->create();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
