@extends(backpack_view('blank'))

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3">
                <i class="la la-dashboard"></i> Dashboard - Back-Office Services Web
            </h1>
            <p class="text-muted">Aperçu général de votre activité</p>
        </div>
    </div>

    <!-- Statistiques principales -->
    <div class="row mb-4">
        <!-- Total devis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Devis
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalQuotes }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="la la-file-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Devis en attente -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                En Attente
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingQuotes }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="la la-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Services
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalServices }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="la la-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réalisations -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Réalisations
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProjects }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="la la-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques et détails -->
    <div class="row">
        <!-- Statut des devis -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Répartition des Devis</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="quotesChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> En attente
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Validé
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Refusé
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Évolution mensuelle -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Évolution des Devis (3 derniers mois)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers devis -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Derniers Devis Reçus</h6>
                    <a href="{{ backpack_url('quote') }}" class="btn btn-sm btn-primary">
                        Voir tous les devis
                    </a>
                </div>
                <div class="card-body">
                    @if($recentQuotes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentQuotes as $quote)
                                        <tr>
                                            <td>{{ $quote->nom }}</td>
                                            <td>{{ $quote->email }}</td>
                                            <td>{{ Str::limit($quote->message, 50) }}</td>
                                            <td>
                                                @switch($quote->status)
                                                    @case('en_attente')
                                                        <span class="badge badge-warning">En attente</span>
                                                        @break
                                                    @case('valide')
                                                        <span class="badge badge-success">Validé</span>
                                                        @break
                                                    @case('refuse')
                                                        <span class="badge badge-danger">Refusé</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ backpack_url('quote/'.$quote->id.'/show') }}" 
                                                   class="btn btn-sm btn-link p-0">
                                                    <i class="la la-eye"></i>
                                                </a>
                                                <a href="{{ backpack_url('quote/'.$quote->id.'/edit') }}" 
                                                   class="btn btn-sm btn-link p-0">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="la la-file-text fa-3x text-gray-300"></i>
                            <p class="mt-3 text-muted">Aucun devis reçu pour le moment.</p>
                            <a href="{{ backpack_url('quote/create') }}" class="btn btn-primary">
                                Créer un devis
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions Rapides</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ backpack_url('quote/create') }}" class="btn btn-outline-primary btn-block">
                                <i class="la la-plus"></i> Nouveau Devis
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ backpack_url('service/create') }}" class="btn btn-outline-info btn-block">
                                <i class="la la-plus"></i> Nouveau Service
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ backpack_url('project/create') }}" class="btn btn-outline-success btn-block">
                                <i class="la la-plus"></i> Nouvelle Réalisation
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ backpack_url('setting') }}" class="btn btn-outline-secondary btn-block">
                                <i class="la la-cogs"></i> Paramètres
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('after_scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Graphique en camembert pour les statuts des devis
const ctx1 = document.getElementById('quotesChart').getContext('2d');
const quotesChart = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['En attente', 'Validé', 'Refusé'],
        datasets: [{
            data: [{{ $pendingQuotes }}, {{ $validatedQuotes }}, {{ $refusedQuotes }}],
            backgroundColor: ['#f6c23e', '#1cc88a', '#e74a3b'],
            borderColor: ['#f6c23e', '#1cc88a', '#e74a3b'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Graphique linéaire pour l'évolution mensuelle
const ctx2 = document.getElementById('monthlyChart').getContext('2d');
const monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

const monthlyData = [
    @foreach($quotesPerMonth as $item)
        {
            month: {{ $item->month }},
            year: {{ $item->year }},
            count: {{ $item->count }}
        },
    @endforeach
];

const monthlyLabels = monthlyData.map(item => monthNames[item.month - 1] + ' ' + item.year);
const monthlyCounts = monthlyData.map(item => item.count);

const monthlyChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: monthlyLabels.reverse(),
        datasets: [{
            label: 'Nombre de devis',
            data: monthlyCounts.reverse(),
            borderColor: '#4e73df',
            backgroundColor: 'rgba(78, 115, 223, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
</script>
@endsection

@section('after_styles')
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-gray-300 {
    color: #dddfeb !important;
}
.text-gray-800 {
    color: #5a5c69 !important;
}
.chart-pie, .chart-area {
    position: relative;
    height: 250px;
}
</style>
@endsection