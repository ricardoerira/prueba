<?php

namespace Tests\Feature\users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserUpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function user_authenticated_can_update_users()
    {
        $authUser = factory(User::class)->create();
        $this->actingAs($authUser);

        $user = factory(User::class)->create();

        $userPut = [
            "name"      => "Juan carlos",
            "email"     => "juan@admin.com",
            "email"     => "password"
        ];

        $response = $this->from('users.edit', $user->id)->put(route('users.update', $user->id), $userPut);

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', $userPut);
    }
}
