<?php

namespace Tests\Browser\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeViewTest extends DuskTestCase
{
    /**
     * @return void
     * @test
     */
    public function an_guest_user_can_view_home()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('home'))
                ->assertSee('Bienvenidos')
                ;
        });
    }
}
