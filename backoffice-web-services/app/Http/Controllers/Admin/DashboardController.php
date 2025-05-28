<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques des devis
        $totalQuotes = Quote::count();
        $pendingQuotes = Quote::where('status', 'en_attente')->count();
        $validatedQuotes = Quote::where('status', 'valide')->count();
        $refusedQuotes = Quote::where('status', 'refuse')->count();

        // Statistiques générales
        $totalServices = Service::count();
        $totalProjects = Project::count();

        // Derniers devis (5 plus récents)
        $recentQuotes = Quote::orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();

        // Devis par mois (3 derniers mois)
        $quotesPerMonth = Quote::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
                              ->whereRaw('created_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH)')
                              ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                              ->orderBy('year', 'desc')
                              ->orderBy('month', 'desc')
                              ->get();

        return view('admin.dashboard', compact(
            'totalQuotes',
            'pendingQuotes', 
            'validatedQuotes',
            'refusedQuotes',
            'totalServices',
            'totalProjects',
            'recentQuotes',
            'quotesPerMonth'
        ));
    }
}