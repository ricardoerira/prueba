<?php

namespace Tests\Browser\Users;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function user_can_view_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('home'))
                ->assertSee('EncuestasCovid')
                ->assertSee('Inicia sesión para comenzar tu sesión')
                ;
        });
    }
}
