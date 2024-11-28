<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Influencer;

class CampaignInfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::with('Influencers')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Lista de campanhas e influencers recuperada com sucesso',
            'data' => $campaigns,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $campaign_id)
    {
        $campaign = Campaign::findOrFail($campaign_id);

        $influencer = Influencer::findOrFail($request->influencer_id);

        if ($campaign->influencers->contains($influencer)) {
            return response()->json(['message' => 'O influenciador já associado a esta campanha'], 400);
        }

        $campaign->influencers()->attach($influencer);

        return response()->json(['message' => 'Influenciador adicionado à campanha com sucesso'], 201);
    }
}
