<?php

use App\Models\InputTypes;
use Illuminate\Database\Seeder;

class InputTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InputTypes::create([
            'name' => 'email'
        ]);

        InputTypes::create([
            'name' => 'search'
        ]);

        InputTypes::create([
            'name' => 'tel'
        ]);

        InputTypes::create([
            'name' => 'url'
        ]);

        InputTypes::create([
            'name' => 'number'
        ]);

        InputTypes::create([
            'name' => 'datetime-local'
        ]);

        InputTypes::create([
            'name' => 'month'
        ]);

        InputTypes::create([
            'name' => 'time'
        ]);

        InputTypes::create([
            'name' => 'week'
        ]);

        InputTypes::create([
            'name' => 'date'
        ]);

        InputTypes::create([
            'name' => 'color'
        ]);

        InputTypes::create([
            'name' => 'text'
        ]);

        InputTypes::create([
            'name' => 'button'
        ]);

        InputTypes::create([
            'name' => 'hidden'
        ]);

        InputTypes::create([
            'name' => 'password'
        ]);

        InputTypes::create([
            'name' => 'checkbox'
        ]);

        InputTypes::create([
            'name' => 'checkbox'
        ]);

        InputTypes::create([
            'name' => 'radio'
        ]);

        InputTypes::create([
            'name' => 'range'
        ]);

        InputTypes::create([
            'name' => 'file'
        ]);

        InputTypes::create([
            'name' => 'submit'
        ]);

        InputTypes::create([
            'name' => 'reset'
        ]);

    }
}
