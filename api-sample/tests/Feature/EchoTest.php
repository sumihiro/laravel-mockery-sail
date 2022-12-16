<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EchoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_echo_apiを叩いてHelloWorldメッセージが返ってくるか()
    {
        $response = $this->get('/api/echo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello World!'
        ]);
    }
}
