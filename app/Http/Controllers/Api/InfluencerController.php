<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Influencer;
use App\Http\Requests\Api\StoreOrUpdateInfluencerRequest;

class InfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $influencers = Influencer::latest()->get();

        return response()->json([
            'status' => 200,
            'message' => 'Lista de influenciadores recuperada com sucesso',
            'data' => $influencers,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOrUpdate(StoreOrUpdateInfluencerRequest $request)
    {
        $data = $request->validated();

        $influencer = Influencer::where('instagram_username', $data['instagram_username'])->first();

        if ($influencer)
        {
            $influencer->update($data);

            return response()->json([
                'message' => 'Influencer atualizado com sucesso',
                'data' => $influencer
            ], 200);
        }

        $influencer = Influencer::create($data);
        
        return response()->json([
            'message' => 'Influencer criado com sucesso',
            'data' => $influencer
        ], 201);
    }
}
