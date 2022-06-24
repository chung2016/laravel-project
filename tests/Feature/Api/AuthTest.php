<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $response = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '0123456789',
        ]);

        $responseData = $response->getData();

        $this->withHeaders([
            'Authorization' => $responseData->token_type . ' ' . $responseData->access_token,
            'Accept' => 'application/json'
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_me_auth()
    {
        $response = $this->get("/api/me");

        $response->assertStatus(200);
    }
}
