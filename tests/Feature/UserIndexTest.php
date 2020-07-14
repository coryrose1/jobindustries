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

    /** @test */
    function the_page_can_be_filtered_by_industry()
    {
        $agricultureIndustry = factory(\App\Industry::class)->create([
            'name' => 'Agriculture'
        ]);

        $otherIndustry = factory(\App\Industry::class)->create([
            'name' => 'Other'
        ]);

        $agricultureUser = factory(\App\User::class)->create();
        $agricultureUser->industries()->attach($agricultureIndustry->id);

        $otherUser = factory(\App\User::class)->create();
        $otherUser->industries()->attach($otherIndustry->id);

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee($agricultureUser->name)
            ->assertSee($otherUser->name);

        $response = $this->get('/?industry=' . $agricultureIndustry->id);

        $response->assertStatus(200)
            ->assertSee($agricultureUser->name)
            ->assertDontSee($otherUser->name);
    }
}
