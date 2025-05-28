<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// API Services
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/{id}', [ServiceController::class, 'show']);
    Route::get('/slug/{slug}', [ServiceController::class, 'getBySlug']);
});

// API Réalisations/Projets
Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/{id}', [ProjectController::class, 'show']);
    Route::get('/recent/{limit?}', [ProjectController::class, 'recent']);
});

// API Paramètres
Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'index']);
    Route::get('/contact', [SettingController::class, 'contact']);
    Route::get('/logos', [SettingController::class, 'logos']);
});

// Route pour récupérer toutes les données en une fois
Route::get('all-data', function () {
    $services = \App\Models\Service::all();
    $projects = \App\Models\Project::all();
    $settings = \App\Models\Setting::first();

    return response()->json([
        'success' => true,
        'data' => [
            'services' => $services,
            'projects' => $projects,
            'settings' => $settings
        ]
    ]);
});

// Route de test API
Route::get('test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API fonctionne correctement',
        'timestamp' => now(),
        'endpoints' => [
            'services' => url('/api/services'),
            'projects' => url('/api/projects'),
            'settings' => url('/api/settings')
        ]
    ]);
});