<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Retourner toutes les réalisations
     */
    public function index()
    {
        $projects = Project::select([
            'id',
            'titre',
            'description',
            'logo',
            'image',
            'lien_page_html',
            'lien',
            'created_at'
        ])->orderBy('created_at', 'desc')->get();

        // Ajouter l'URL complète pour les images
        $projects->transform(function ($project) {
            if ($project->logo) {
                $project->logo_url = asset('storage/projects/' . $project->logo);
            }
            if ($project->image) {
                $project->image_url = asset('storage/projects/' . $project->image);
            }
            return $project;
        });

        return response()->json([
            'success' => true,
            'data' => $projects,
            'count' => $projects->count()
        ]);
    }

    /**
     * Retourner une réalisation spécifique
     */
    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Réalisation non trouvée'
            ], 404);
        }

        // Ajouter l'URL complète pour les images
        if ($project->logo) {
            $project->logo_url = asset('storage/projects/' . $project->logo);
        }
        if ($project->image) {
            $project->image_url = asset('storage/projects/' . $project->image);
        }

        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }

    /**
     * Retourner les projets récents (limités)
     */
    public function recent($limit = 6)
    {
        $projects = Project::select([
            'id',
            'titre',
            'description',
            'logo',
            'image',
            'lien',
            'created_at'
        ])
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();

        // Ajouter l'URL complète pour les images
        $projects->transform(function ($project) {
            if ($project->logo) {
                $project->logo_url = asset('storage/projects/' . $project->logo);
            }
            if ($project->image) {
                $project->image_url = asset('storage/projects/' . $project->image);
            }
            return $project;
        });

        return response()->json([
            'success' => true,
            'data' => $projects,
            'count' => $projects->count()
        ]);
    }
}