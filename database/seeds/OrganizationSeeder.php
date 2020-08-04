<?php

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = "IDPAC";

        Organization::create([
            "name" => "IDPAC",
            "slug"              => Str::slug($name)
        ]);
    }
}
