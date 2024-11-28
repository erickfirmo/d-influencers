<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InfluencerController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\CampaignInfluencerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::get('influencers', [InfluencerController::class, 'index']);
    Route::post('influencers', [InfluencerController::class, 'storeOrUpdate']);

    Route::get('campaigns', [CampaignController::class, 'index']);
    Route::post('campaigns', [CampaignController::class, 'store']);
    #Route::post('campaigns/update/{id}', [CampaignController::class, 'update']);

    Route::get('campaigns/{campaign_id}/influencers', [CampaignInfluencerController::class, 'index']);
    Route::post('campaigns/{campaign_id}/influencers', [CampaignInfluencerController::class, 'store']);
});
