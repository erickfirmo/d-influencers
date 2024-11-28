<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Http\Requests\Api\StoreCampaignRequest;
use App\Http\Requests\Api\UpdateCampaignRequest;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::latest()->get();

        return response()->json([
            'status' => 200,
            'message' => 'Lista de campanhas recuperada com sucesso',
            'data' => $campaigns,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampaignRequest $request)
    {
        $data = $request->validated();

        $campaign = Campaign::create($data);
        
        return response()->json([
            'message' => 'Campanha criada com sucesso',
            'data' => $campaign
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampaignRequest $request, string $id)
    {
        $data = $request->validated();

        $campaign = Campaign::findOrFail($id);

        $campaign->update($data);

        return response()->json([
            'message' => 'Campanha atualizada com sucesso',
            'data' => $campaign
        ], 200);
    }
}
