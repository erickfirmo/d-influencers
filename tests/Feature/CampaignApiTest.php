<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Campaign;
use App\Models\User;

class CampaignApiTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testGetAllCampaigns()
    {
        $response = $this->actingAs($this->user, 'api')->get('/api/campaigns');
        $response->assertStatus(200);
    }

    public function testCreateCampaign()
    {
        $data = [
            'name' => 'Campanha Teste',
            'budget' => 5000,
            'description' => 'Lorem ipsum dolor sit amet',
            'start_date' => '2024-12-01',
            'end_date' => '2024-12-31',
        ];

        $response = $this->actingAs($this->user, 'api')->postJson('/api/campaigns', $data);
        $response->assertStatus(201);
    }
}
