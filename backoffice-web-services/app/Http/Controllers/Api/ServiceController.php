<?php

// App\Http\Controllers\Api\ServiceController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::select([
            'id',
            'titre',
            'description',
            'logo',
            'image',
            'nom_de_page_html',
            'created_at'
        ])->orderBy('created_at', 'desc')->get();

        // Ajouter les URLs via les accesseurs
        $services->each(function ($service) {
            $service->logo_url = $service->logo_url; // Utilise l'accesseur
            $service->image_url = $service->image_url; // Utilise l'accesseur
        });

        return response()->json([
            'success' => true,
            'data' => $services,
            'count' => $services->count()
        ]);
    }

    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service non trouvé'
            ], 404);
        }

        // Les URLs sont automatiquement ajoutées via les accesseurs
        $service->logo_url = $service->logo_url;
        $service->image_url = $service->image_url;

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }

    public function getBySlug($slug)
    {
        $service = Service::where('nom_de_page_html', $slug)->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service non trouvé'
            ], 404);
        }

        $service->logo_url = $service->logo_url;
        $service->image_url = $service->image_url;

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }
}