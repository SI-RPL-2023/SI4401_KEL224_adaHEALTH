<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArtikelShowTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group showArtikel
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Solusi')
                ->click('a','Login')
                ->assertPathIs('/login')
                ->assertSee('Login')
                ->type('email', 'admin@gmail.com')
                ->type('password', '12345678')
                ->press('Login')
                ->visit('/artikel')
                ->assertSee('Artikel')
                ->clickLink('1')
                ->assertPathIs('/artikel/1')
                ->scroll(500)
                ->pause(15000);

        });
    }
}
