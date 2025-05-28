<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Retourner tous les services
     */
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

        // Ajouter l'URL complète pour les images
        $services->transform(function ($service) {
            if ($service->logo) {
                $service->logo_url = asset('uploads/services/' . $service->logo);
            }
            if ($service->image) {
                $service->image_url = asset('uploads/services/' . $service->image);
            }
            return $service;
        });

        return response()->json([
            'success' => true,
            'data' => $services,
            'count' => $services->count()
        ]);
    }

    /**
     * Retourner un service spécifique
     */
    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service non trouvé'
            ], 404);
        }

        // Ajouter l'URL complète pour les images
        if ($service->logo) {
            $service->logo_url = asset('uploads/services/' . $service->logo);
        }
        if ($service->image) {
            $service->image_url = asset('uploads/services/' . $service->image);
        }

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }

    /**
     * Rechercher par nom de page HTML
     */
    public function getBySlug($slug)
    {
        $service = Service::where('nom_de_page_html', $slug)->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service non trouvé'
            ], 404);
        }

        // Ajouter l'URL complète pour les images
        if ($service->logo) {
            $service->logo_url = asset('uploads/services/' . $service->logo);
        }
        if ($service->image) {
            $service->image_url = asset('uploads/services/' . $service->image);
        }

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }
}