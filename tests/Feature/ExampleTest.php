<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$response = $this->get('/');

        //$response->assertStatus(200);
        //* Can be tested by entering vendor/bin/phpunit tests/Feature/ExampleTest.php in the command line (see notes).
        $this->get('/')->assertSee('The Bootstrap Blog');
    }
}
