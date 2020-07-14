<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_has_a_job_title()
    {
        $user = factory(\App\User::class)->create([
            'job_title' => 'Waiter'
        ]);
        $this->assertNotNull($user->job_title);
        $this->assertEquals($user->job_title, 'Waiter');
    }

    /** @test */
    function a_user_can_have_many_industries()
    {
        $user = factory(\App\User::class)->create();
        $industries = factory(\App\Industry::class, 5)->create();
        $user->industries()->attach(
            $industries->pluck('id')->toArray()
        );

        $this->assertEquals($user->industries()->count(), 5);
        $this->assertInstanceOf(\App\Industry::class, $user->industries[0]);
    }
}
