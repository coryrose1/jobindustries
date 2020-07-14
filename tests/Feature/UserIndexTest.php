<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function the_home_page_displays_users()
    {
        $users = factory(\App\User::class, 3)->create();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Users')
            ->assertSee($users->first()->name);
    }
}
