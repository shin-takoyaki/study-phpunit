<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Stubs\RequestStubs;

class UserApiTest extends TestCase
{
    /** @test */
    public function 正常系_ユーザー情報を取得できる()
    {
        $response = $this->postJson('/api/user/info', RequestStubs::validUserRequest());

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => '123',
                     'name' => 'Fake User',
                     'email' => 'fake@example.com',
                 ]);
    }

    /** @test */
    public function 異常系_リクエストパラメータが不正な場合はバリデーションエラー()
    {
        $response = $this->postJson('/api/user/info', RequestStubs::invalidUserRequest());

        $response->assertStatus(422);
    }
}
