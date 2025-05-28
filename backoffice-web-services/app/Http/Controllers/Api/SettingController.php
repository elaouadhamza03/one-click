<?php

// App\Http\Controllers\Api\SettingController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        if (!$settings) {
            return response()->json([
                'success' => false,
                'message' => 'Paramètres non configurés'
            ], 404);
        }

        $settings->logo_blanc_url = $settings->logo_blanc_url;
        $settings->logo_noir_url = $settings->logo_noir_url;

        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }

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

        $response = [];
        if ($settings->logo_blanc) {
            $response['logo_blanc'] = $settings->logo_blanc_url;
        }
        if ($settings->logo_noir) {
            $response['logo_noir'] = $settings->logo_noir_url;
        }

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }
}