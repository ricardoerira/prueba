<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function user_can_view_login()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
