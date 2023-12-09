<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authenticate_user_with_username_and_password()
    {

        $response =  $this->post(route('login_authentication_route'),[
            'user_name' => 'rootSaDa01',
            'password'  => '1960+2013'
        ]);

        $response->assertRedirect('/administration');

        $response =  $this->post(route('login_authentication_route'),[
            'user_name' => 'duran0111111111',
            'password'  => '123456789101112'
        ]);


        $response->assertSessionHas('fail', 'Invalid Credentials, Try Again');

    }
}
