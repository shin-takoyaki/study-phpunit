<?php

namespace Tests\Feature;

use App\External\ExternalApiInterface;
use Mockery\MockInterface;
use Tests\Stubs\RequestStubs;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    /**
     * @test
     * @group 正常系
     */
    public function 正常系_ユーザー情報を取得できる(): void
    {
        $this->mock(ExternalApiInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('fetchUserInfo')
                ->once()
                ->with('123')
                ->andReturn([
                    'id' => '123',
                    'name' => 'Mocked User',
                    'email' => 'mocked@example.com',
                ]);
        });

        $response = $this->postJson('/api/user/info', RequestStubs::validUserRequest());

        $response->assertStatus(200)
            ->assertJson([
                'id' => '123',
                'name' => 'Mocked User',
                'email' => 'mocked@example.com',
            ]);
    }

    /**
     * @test
     * @group 異常系
     */
    public function 異常系_リクエストパラメータが不正な場合はバリデーションエラー(): void
    {
        $response = $this->postJson('/api/user/info', RequestStubs::invalidUserRequest());

        $response->assertStatus(422);
    }
}
