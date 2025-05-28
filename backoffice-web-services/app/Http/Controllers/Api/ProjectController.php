<?php

// App\Http\Controllers\Api\ProjectController.php  
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
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

        $projects->each(function ($project) {
            $project->logo_url = $project->logo_url;
            $project->image_url = $project->image_url;
        });

        return response()->json([
            'success' => true,
            'data' => $projects,
            'count' => $projects->count()
        ]);
    }

    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Réalisation non trouvée'
            ], 404);
        }

        $project->logo_url = $project->logo_url;
        $project->image_url = $project->image_url;

        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }

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

        $projects->each(function ($project) {
            $project->logo_url = $project->logo_url;
            $project->image_url = $project->image_url;
        });

        return response()->json([
            'success' => true,
            'data' => $projects,
            'count' => $projects->count()
        ]);
    }
}