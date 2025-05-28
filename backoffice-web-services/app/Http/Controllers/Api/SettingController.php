<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Retourner les paramètres du site
     */
    public function index()
    {
        $settings = Setting::first(); // Un seul enregistrement de paramètres

        if (!$settings) {
            return response()->json([
                'success' => false,
                'message' => 'Paramètres non configurés'
            ], 404);
        }

        // Ajouter l'URL complète pour les logos
        if ($settings->logo_blanc) {
            $settings->logo_blanc_url = asset('storage/settings/' . $settings->logo_blanc);
        }
        if ($settings->logo_noir) {
            $settings->logo_noir_url = asset('storage/settings/' . $settings->logo_noir);
        }

        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }

    /**
     * Retourner seulement les informations de contact
     */
    public function contact()
    {
        $settings = Setting::select([
            'email_contact',
            'adresse',
            'telephone',
            'localisation'
        ])->first();

        if (!$settings) {
            return response()->json([
                'success' => false,
                'message' => 'Informations de contact non configurées'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }

    /**
     * Retourner seulement les logos
     */
    public function logos()
    {
        $settings = Setting::select([
            'logo_blanc',
            'logo_noir'
        ])->first();

        if (!$settings) {
            return response()->json([
                'success' => false,
                'message' => 'Logos non configurés'
            ], 404);
        }

        // Ajouter l'URL complète pour les logos
        $response = [];
        if ($settings->logo_blanc) {
            $response['logo_blanc'] = asset('storage/settings/' . $settings->logo_blanc);
        }
        if ($settings->logo_noir) {
            $response['logo_noir'] = asset('storage/settings/' . $settings->logo_noir);
        }

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }
}