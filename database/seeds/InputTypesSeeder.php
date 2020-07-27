<?php

use App\Models\InputTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'name' => 'email',
            'slug' => Str::slug('email')
        ]);

        InputTypes::create([
            'name' => 'search',
            'slug' => Str::slug('search')
        ]);

        InputTypes::create([
            'name' => 'tel',
            'slug' => Str::slug('tel')

        ]);

        InputTypes::create([
            'name' => 'url',
            'slug' => Str::slug('url')
        ]);

        InputTypes::create([
            'name' => 'number',
            'slug' => Str::slug('number')
        ]);

        InputTypes::create([
            'name' => 'datetime-local',
            'slug' => Str::slug('datetime-local')
        ]);

        InputTypes::create([
            'name' => 'month',
            'slug' => Str::slug('month')
        ]);

        InputTypes::create([
            'name' => 'time',
            'slug' => Str::slug('time')
        ]);

        InputTypes::create([
            'name' => 'week',
            'slug' => Str::slug('week')
        ]);

        InputTypes::create([
            'name' => 'date',
            'slug' => Str::slug('date')
        ]);

        InputTypes::create([
            'name' => 'color',
            'slug' => Str::slug('color')
        ]);

        InputTypes::create([
            'name' => 'text',
            'slug' => Str::slug('text')
        ]);

        InputTypes::create([
            'name' => 'button',
            'slug' => Str::slug('button')
        ]);

        InputTypes::create([
            'name' => 'hidden',
            'slug' => Str::slug('hidden')
        ]);

        InputTypes::create([
            'name' => 'password',
            'slug' => Str::slug('password')
        ]);

        InputTypes::create([
            'name' => 'checkbox',
            'slug' => Str::slug('checkbox')
        ]);

        InputTypes::create([
            'name' => 'checkbox',
            'slug' => Str::slug('checkbox')
        ]);

        InputTypes::create([
            'name' => 'radio',
            'slug' => Str::slug('radio')
        ]);

        InputTypes::create([
            'name' => 'range',
            'slug' => Str::slug('range')
        ]);

        InputTypes::create([
            'name' => 'file',
            'slug' => Str::slug('file')
        ]);

        InputTypes::create([
            'name' => 'submit',
            'slug' => Str::slug('submit')
        ]);

        InputTypes::create([
            'name' => 'reset',
            'slug' => Str::slug('reset')
        ]);

    }
}
