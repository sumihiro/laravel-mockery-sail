<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\HelloWorldService;
use Mockery;
use Tests\TestCase;

/**
 * 普通に各テストメソッドでmockを作るパターンのテストクラス
 * mockの処理を何度実行してもエラーにならないことを確認する
 * 
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
        $reserveMock = Mockery::mock('overload:' . HelloWorldService::class);
        $reserveMock->shouldReceive('hello')->andReturn('Bye World...');
        
        $response = $this->get('/api/echo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Bye World...'
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_echo_mockしたapiを叩いてByebyeWorldメッセージが返ってくるか()
    {
        $reserveMock = Mockery::mock('overload:' . HelloWorldService::class);
        $reserveMock->shouldReceive('hello')->andReturn('Byebye World...');
        
        $response = $this->get('/api/echo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Byebye World...'
        ]);
    }
}
