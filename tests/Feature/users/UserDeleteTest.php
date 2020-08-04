<?php

namespace Tests\Feature\users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_delete_users():void
    {
        $user = factory(User::class)->create();

        $response = $this->delete(route('users.delete', $user->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_cannot_delete_users():void
    {
        $AuthUser = factory(User::class)->create();
        $this->actingAs($AuthUser);

        $user = factory(User::class)->create();

        $response = $this->delete(route('users.delete', $user->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));

        $this->assertDeleted($user);
    }
}
