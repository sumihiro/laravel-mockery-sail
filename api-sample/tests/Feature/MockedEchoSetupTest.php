<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\HelloWorldService;
use Mockery;
use Tests\TestCase;

/**
 * setUpメソッドでmockを作るパターンのテストクラス
 * mockの処理をsetUpで実行してもエラーにならないことを確認する
 * 
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class MockedEchoSetupTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $reserveMock = Mockery::mock('overload:' . HelloWorldService::class);
        $reserveMock->shouldReceive('hello')->andReturn('Byebye World...');
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_echo_mockしたapiを叩いてByebyeWorldメッセージが返ってくるか()
    {
        $response = $this->get('/api/echo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Byebye World...'
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_もう一度echo_mockしたapiを叩いてByebyeWorldメッセージが返ってくるか()
    {        
        $response = $this->get('/api/echo');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Byebye World...'
        ]);
    }
}
