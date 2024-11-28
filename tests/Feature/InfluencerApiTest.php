<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class InfluencerApiTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testGetAllInfluencers()
    {
        $response = $this->actingAs($this->user, 'api')->get('/api/influencers');
        $response->assertStatus(200);
    }

    public function testCreateInfluencer()
    {
        $data = [
            'name' => 'Novo Influencer',
            'followers_count' => 1000,
            'category' => 'Marketing',
            'instagram_username' => 'tester_' . Str::random(10)
        ];

        $response = $this->actingAs($this->user, 'api')->postJson('/api/influencers', $data);
        $response->assertStatus(201);
    }
}
