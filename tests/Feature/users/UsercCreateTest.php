<?php

namespace Tests\Feature\users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsercCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_users_view(): void
    {
        $response = $this->get(route('users.index'));

        $response->assertRedirect(route('home'));
    }

    /**
     * @return void
     * @test
     */
    public function user_authenticated_can_view_users(): void
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
    }

}
