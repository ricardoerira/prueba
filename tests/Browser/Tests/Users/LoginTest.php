<?php

namespace Tests\Browser\Test\Users;

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
            $browser->visit(route('login'))
                ->assertSee('FormatosCovid')
                ->assertSee('Inicia sesión para comenzar tu sesión')
                ;
        });
    }
}
