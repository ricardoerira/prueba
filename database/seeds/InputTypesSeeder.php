<?php

use App\Models\InputType;
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
        InputType::create([
            'name' => 'email',
            'slug' => Str::slug('email')
        ]);

        InputType::create([
            'name' => 'search',
            'slug' => Str::slug('search')
        ]);

        InputType::create([
            'name' => 'tel',
            'slug' => Str::slug('tel')
        ]);

        InputType::create([
            'name' => 'url',
            'slug' => Str::slug('url')
        ]);

        InputType::create([
            'name' => 'number',
            'slug' => Str::slug('number')
        ]);

        InputType::create([
            'name' => 'datetime-local',
            'slug' => Str::slug('datetime-local')
        ]);

        InputType::create([
            'name' => 'month',
            'slug' => Str::slug('month')
        ]);

        InputType::create([
            'name' => 'time',
            'slug' => Str::slug('time')
        ]);

        InputType::create([
            'name' => 'week',
            'slug' => Str::slug('week')
        ]);

        InputType::create([
            'name' => 'date',
            'slug' => Str::slug('date')
        ]);

        InputType::create([
            'name' => 'color',
            'slug' => Str::slug('color')
        ]);

        InputType::create([
            'name' => 'text',
            'slug' => Str::slug('text')
        ]);

        InputType::create([
            'name' => 'button',
            'slug' => Str::slug('button')
        ]);

        InputType::create([
            'name' => 'hidden',
            'slug' => Str::slug('hidden')
        ]);

        InputType::create([
            'name' => 'password',
            'slug' => Str::slug('password')
        ]);

        InputType::create([
            'name' => 'checkbox',
            'slug' => Str::slug('checkbox')
        ]);

        InputType::create([
            'name' => 'radio',
            'slug' => Str::slug('radio')
        ]);

        InputType::create([
            'name' => 'range',
            'slug' => Str::slug('range')
        ]);

        InputType::create([
            'name' => 'file',
            'slug' => Str::slug('file')
        ]);

        InputType::create([
            'name' => 'submit',
            'slug' => Str::slug('submit')
        ]);

        InputType::create([
            'name' => 'reset',
            'slug' => Str::slug('reset')
        ]);

        InputType::create([
            'name' => 'select',
            'slug' => Str::slug('select')
        ]);

        InputType::create([
            'name' => 'textarea',
            'slug' => Str::slug('textarea')
        ]);

        InputType::create([
            'name' => 'combo',
            'slug' => Str::slug('combo')
        ]);

    }
}
