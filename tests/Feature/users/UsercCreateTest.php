<?php

namespace Tests\Feature\users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use RolesTableSeeder;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_users_view(): void
    {
        $response = $this->get(route('users.index'));

        $response->assertRedirect(route('login'));
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

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_users_create_view(): void
    {
        $response = $this->get(route('users.create'));

        $response->assertRedirect(route('login'));
    }

    /**
     * @return void
     * @test
     */
    public function user_authenticated_can_view_create_users(): void
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
    }

    // TODO: validation request

    /**
     * @return void
     * @test
     */
    public function user_authenticated_can_create_users(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $role = factory(Role::class)->create();

        $this->actingAs($user);

        $userPost = [
            "name"              => "juan camilo",
            "email"             => "juancamilo@gmail.com",
            "password"          => "password123",
            'role_id'           => $role->id,
        ];

        $response = $this->from(route('users.create'))->post(route('users.save'), $userPost);

        $response->assertStatus(302);

        $response->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', $userPost);
    }

}
