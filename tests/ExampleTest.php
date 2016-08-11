<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLandingPage()
    {
        $this->visit('/')
             ->see('LaraApi');
    }

    public function testPublicRoute()
    {
        $this->visit('/api/free')
             ->see('Welcome Guest, Its a public route');
    }
}
