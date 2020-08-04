<?php

namespace Tests\Feature\headers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateHeadersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_headers_view()
    {
        $response = $this->get(route('headers.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    /**
     * @return void
     * @test
     */
    public function user_authenticated_can_view_headers()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('headers.index'));

        $response->assertStatus(200);
    }

}
