<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\HelloWorldService;
use Mockery;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class MockedEchoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_echo_mockしたapiを叩いてByeWorldメッセージが返ってくるか()
    {
        // 実際の予約処理をモックしておく
        $reserveMock = Mockery::mock('overload:' . HelloWorldService::class);
        $reserveMock->shouldReceive('hello')->andReturn('Bye World...');
        
        $response = $this->get('/api/echo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Bye World...'
        ]);
    }
}
