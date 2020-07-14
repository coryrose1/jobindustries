<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndustryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_industry_has_a_name()
    {
        $industry = factory(\App\Industry::class)->create([
            'name' => 'Advertising'
        ]);
        $this->assertNotNull($industry->name);
        $this->assertEquals($industry->name, 'Advertising');
    }

    /** @test */
    function an_industry_can_have_many_users()
    {
        $industry = factory(\App\Industry::class)->create();
        $users = factory(\App\User::class, 5)->create();
        $industry->users()->attach(
            $users->pluck('id')->toArray()
        );

        $this->assertEquals($industry->users()->count(), 5);
        $this->assertInstanceOf(\App\User::class, $industry->users[0]);
    }
}
