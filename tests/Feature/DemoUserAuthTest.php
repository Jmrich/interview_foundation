<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DemoUserAuthTest extends TestCase
{
    use RefreshDatabase;

    public function testCanLoginWhenDemoUserAlreadyCreated()
    {
        $user = factory(User::class)->create([
            'email' => 'demo@interview_foundation.com'
        ]);

        $response = $this->get(route('demo-login'));
        $this->assertEquals($user->email, auth()->user()->email);
        $response->assertRedirect('/');
    }

    public function testCanLoginWhenDemoUserDoesNotExist()
    {
        $response = $this->get(route('demo-login'));
        $this->assertEquals('demo@interview_foundation.com', auth()->user()->email);
        $response->assertRedirect('/');
    }
}
