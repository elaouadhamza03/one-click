@extends(backpack_view('blank'))

@section('content')
<div class="container-fluid px-4">
    <!-- Header avec gradient et animation -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="hero-section bg-gradient-primary text-white rounded-4 shadow-lg p-4 mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-6 fw-bold mb-3">
                            <i class="fas fa-tachometer-alt me-3"></i>
                            Dashboard - Back-Office Services Web
                        </h1>
                        <p class="lead mb-0 opacity-90">
                            Gérez efficacement vos devis, services et réalisations
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="dashboard-stats-mini text-white">
                            <small class="d-block opacity-75">Dernière mise à jour</small>
                            <span class="fw-semibold">{{ now()->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques principales avec animations -->
    <div class="row g-4 mb-5">
        <!-- Total devis -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card stats-card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="stats-icon bg-primary-soft rounded-3 p-3 mb-3">
                                <i class="fas fa-file-invoice text-primary fa-2x"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2 tracking-wide">
                                Total Devis
                            </h6>
                            <h2 class="fw-bold text-dark mb-0 counter">{{ $totalQuotes }}</h2>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Devis en attente -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card stats-card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="stats-icon bg-warning-soft rounded-3 p-3 mb-3">
                                <i class="fas fa-clock text-warning fa-2x"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2 tracking-wide">
                                En Attente
                            </h6>
                            <h2 class="fw-bold text-dark mb-0 counter">{{ $pendingQuotes }}</h2>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-warning" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card stats-card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="stats-icon bg-info-soft rounded-3 p-3 mb-3">
                                <i class="fas fa-cogs text-info fa-2x"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2 tracking-wide">
                                Services
                            </h6>
                            <h2 class="fw-bold text-dark mb-0 counter">{{ $totalServices }}</h2>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-info" style="width: 90%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réalisations -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card stats-card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="stats-icon bg-success-soft rounded-3 p-3 mb-3">
                                <i class="fas fa-trophy text-success fa-2x"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2 tracking-wide">
                                Réalisations
                            </h6>
                            <h2 class="fw-bold text-dark mb-0 counter">{{ $totalProjects }}</h2>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-success" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques améliorés -->
    <div class="row g-4 mb-5">
        <!-- Statut des devis -->
        <div class="col-xl-6 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="fw-bold text-dark mb-1">Répartition des Devis</h5>
                            <p class="text-muted small mb-0">Analyse des statuts actuels</p>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Exporter</a></li>
                                    <li><a class="dropdown-item" href="#">Imprimer</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="chart-container mb-4">
                        <canvas id="quotesChart" style="height: 280px;"></canvas>
                    </div>
                    <div class="row text-center g-3">
                        <div class="col-4">
                            <div class="legend-item">
                                <div class="legend-color bg-warning rounded-circle mx-auto mb-2"></div>
                                <small class="text-muted d-block">En attente</small>
                                <span class="fw-bold">{{ $pendingQuotes }}</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="legend-item">
                                <div class="legend-color bg-success rounded-circle mx-auto mb-2"></div>
                                <small class="text-muted d-block">Validé</small>
                                <span class="fw-bold">{{ $validatedQuotes }}</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="legend-item">
                                <div class="legend-color bg-danger rounded-circle mx-auto mb-2"></div>
                                <small class="text-muted d-block">Refusé</small>
                                <span class="fw-bold">{{ $refusedQuotes }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Évolution mensuelle -->
        <div class="col-xl-6 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="fw-bold text-dark mb-1">Évolution des Devis</h5>
                            <p class="text-muted small mb-0">Tendance sur 3 mois</p>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-primary-soft text-primary px-3 py-2">
                                <i class="fas fa-trending-up me-1"></i> +12.5%
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="chart-container">
                        <canvas id="monthlyChart" style="height: 280px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des derniers devis -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="fw-bold text-dark mb-1">Derniers Devis Reçus</h5>
                            <p class="text-muted small mb-0">Gestion des demandes récentes</p>
                        </div>
                        <div class="col-auto">
                            <a href="{{ backpack_url('quote') }}" class="btn btn-primary btn-sm px-4">
                                <i class="fas fa-eye me-2"></i>Voir tous
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($recentQuotes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 fw-semibold py-3">Nom</th>
                                        <th class="border-0 fw-semibold py-3">Email</th>
                                        <th class="border-0 fw-semibold py-3">Message</th>
                                        <th class="border-0 fw-semibold py-3">Statut</th>
                                        <th class="border-0 fw-semibold py-3">Date</th>
                                        <th class="border-0 fw-semibold py-3 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentQuotes as $quote)
                                        <tr>
                                            <td class="py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-primary-soft rounded-circle me-3 d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-user text-primary"></i>
                                                    </div>
                                                    <span class="fw-semibold">{{ $quote->nom }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 text-muted">{{ $quote->email }}</td>
                                            <td class="py-3">
                                                <span class="text-truncate" style="max-width: 200px;">
                                                    {{ Str::limit($quote->message, 50) }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                @switch($quote->status)
                                                    @case('en_attente')
                                                        <span class="badge bg-warning-soft text-warning px-3 py-2">
                                                            <i class="fas fa-clock me-1"></i>En attente
                                                        </span>
                                                        @break
                                                    @case('valide')
                                                        <span class="badge bg-success-soft text-success px-3 py-2">
                                                            <i class="fas fa-check me-1"></i>Validé
                                                        </span>
                                                        @break
                                                    @case('refuse')
                                                        <span class="badge bg-danger-soft text-danger px-3 py-2">
                                                            <i class="fas fa-times me-1"></i>Refusé
                                                        </span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td class="py-3 text-muted">{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-3 text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ backpack_url('quote/'.$quote->id.'/show') }}" 
                                                       class="btn btn-outline-primary btn-sm" title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ backpack_url('quote/'.$quote->id.'/edit') }}" 
                                                       class="btn btn-outline-secondary btn-sm" title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="empty-state">
                                <div class="empty-icon bg-light rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <i class="fas fa-file-invoice fa-2x text-muted"></i>
                                </div>
                                <h6 class="fw-semibold text-dark mb-2">Aucun devis reçu</h6>
                                <p class="text-muted mb-4">Commencez par créer votre premier devis.</p>
                                <a href="{{ backpack_url('quote/create') }}" class="btn btn-primary px-4">
                                    <i class="fas fa-plus me-2"></i>Créer un devis
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides modernisées -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-4">
                    <h5 class="fw-bold text-dark mb-1">Actions Rapides</h5>
                    <p class="text-muted small mb-0">Accès direct aux fonctionnalités principales</p>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ backpack_url('quote/create') }}" class="action-card text-decoration-none">
                                <div class="card border-0 bg-primary-soft h-100 hover-lift-light">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-primary text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-plus fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold text-primary mb-2">Nouveau Devis</h6>
                                        <p class="text-muted small mb-0">Créer une nouvelle demande</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ backpack_url('service/create') }}" class="action-card text-decoration-none">
                                <div class="card border-0 bg-info-soft h-100 hover-lift-light">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-info text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-cogs fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold text-info mb-2">Nouveau Service</h6>
                                        <p class="text-muted small mb-0">Ajouter un service</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ backpack_url('project/create') }}" class="action-card text-decoration-none">
                                <div class="card border-0 bg-success-soft h-100 hover-lift-light">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-success text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-trophy fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold text-success mb-2">Nouvelle Réalisation</h6>
                                        <p class="text-muted small mb-0">Ajouter un projet</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ backpack_url('setting') }}" class="action-card text-decoration-none">
                                <div class="card border-0 bg-secondary-soft h-100 hover-lift-light">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-secondary text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-cog fa-lg"></i>
                                        </div>
                                        <h6 class="fw-bold text-secondary mb-2">Paramètres</h6>
                                        <p class="text-muted small mb-0">Configuration système</p>
                                    </div>
                                </div>
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
// Configuration globale des graphiques
Chart.defaults.font.family = "'Inter', sans-serif";
Chart.defaults.color = '#6c757d';

// Graphique en camembert pour les statuts des devis
const ctx1 = document.getElementById('quotesChart').getContext('2d');
const quotesChart = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['En attente', 'Validé', 'Refusé'],
        datasets: [{
            data: [{{ $pendingQuotes }}, {{ $validatedQuotes }}, {{ $refusedQuotes }}],
            backgroundColor: ['#ffc107', '#198754', '#dc3545'],
            borderColor: ['transparent'],
            borderWidth: 0,
            cutout: '70%'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        },
        elements: {
            arc: {
                borderWidth: 0
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
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13, 110, 253, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#0d6efd',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            intersect: false,
            mode: 'index'
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                border: {
                    display: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                },
                border: {
                    display: false
                },
                ticks: {
                    stepSize: 1
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        }
    }
});

// Animation pour les compteurs
function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        let current = 0;
        const increment = target / 20;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 50);
    });
}

// Déclencher l'animation au chargement
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(animateCounters, 500);
});
</script>
@endsection

@section('after_styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Variables CSS pour la cohérence */
:root {
    --primary-color: #0d6efd;
    --success-color: #198754;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --info-color: #0dcaf0;
    --secondary-color: #6c757d;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --border-radius: 0.75rem;
    --box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    --box-shadow-lg: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

/* Font global */
body {
    font-family: 'Inter', sans-serif;
    background-color: #f8f9fc;
}

/* Header gradient */
.bg-gradient-primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, #4c6ef5 100%);
}

.hero-section {
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    z-index: 1;
}

/* Cartes de statistiques */
.stats-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.12) !important;
}

.hover-lift-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.08) !important;
}

.stats-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Couleurs soft */
.bg-primary-soft {
    background-color: rgba(13, 110, 253, 0.1) !important;
}

.bg-success-soft {
    background-color: rgba(25, 135, 84, 0.1) !important;
}

.bg-warning-soft {
    background-color: rgba(255, 193, 7, 0.1) !important;
}

.bg-danger-soft {
    background-color: rgba(220, 53, 69, 0.1) !important;
}

.bg-info-soft {
    background-color: rgba(13, 202, 240, 0.1) !important;
}

.bg-secondary-soft {
    background-color: rgba(108, 117, 125, 0.1) !important;
}

/* Text colors soft */
.text-primary { color: var(--primary-color) !important; }
.text-success { color: var(--success-color) !important; }
.text-warning { color: var(--warning-color) !important; }
.text-danger { color: var(--danger-color) !important; }
.text-info { color: var(--info-color) !important; }

/* Tracking */
.tracking-wide {
    letter-spacing: 0.05em;
}

/* Légende du graphique */
.legend-color {
    width: 16px;
    height: 16px;
}

.legend-item {
    text-align: center;
}

/* Container des graphiques */
.chart-container {
    position: relative;
    height: 280px;
}

/* Tableau */
.table-hover tbody tr:hover {
    background-color: rgba(13, 110, 253, 0.04);
}

.avatar-sm {
    width: 36px;
    height: 36px;
}

/* Badges */
.badge {
    font-weight: 500;
    border-radius: 6px;
}

/* Cartes d'actions */
.action-card {
    display: block;
    transition: all 0.3s ease;
}

.action-icon {
    transition: all 0.3s ease;
}

.action-card:hover .action-icon {
    transform: scale(1.1);
}

/* État vide */
.empty-state {
    padding: 2rem 1rem;
}

.empty-icon {
    transition: all 0.3s ease;
}

.empty-state:hover .empty-icon {
    transform: scale(1.05);
}

/* Buttons */
.btn {
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.btn-group-sm > .btn, .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    border-radius: 6px;
}

/* Cards */
.card {
    border-radius: var(--border-radius);
    transition: all 0.3s ease;
}

.card-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    background-color: transparent;
}

/* Progress bars */
.progress {
    border-radius: 6px;
    background-color: rgba(0, 0, 0, 0.05);
}

.progress-bar {
    border-radius: 6px;
}

/* Responsive design */
@media (max-width: 768px) {
    .hero-section {
        text-align: center;
    }
    
    .hero-section .col-md-4 {
        margin-top: 1rem;
    }
    
    .dashboard-stats-mini {
        text-align: center !important;
    }
    
    .display-6 {
        font-size: 1.75rem;
    }
    
    .stats-card .card-body {
        padding: 1.5rem !important;
    }
    
    .chart-container {
        height: 220px;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .hero-section {
        margin-bottom: 1.5rem !important;
    }
    
    .stats-card .stats-icon {
        width: 50px;
        height: 50px;
    }
    
    .stats-card .stats-icon i {
        font-size: 1.5rem !important;
    }
    
    .action-card .action-icon {
        width: 50px !important;
        height: 50px !important;
    }
    
    .action-card .action-icon i {
        font-size: 1rem !important;
    }
    
    .card-body {
        padding: 1rem !important;
    }
}

/* Animation keyframes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Animation classes */
.fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

.pulse-on-hover:hover {
    animation: pulse 0.6s ease-in-out;
}

/* Améliorations de l'accessibilité */
.btn:focus,
.btn.focus {
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.card:focus-within {
    box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.25);
}

/* Scrollbar personnalisée */
.table-responsive::-webkit-scrollbar {
    height: 6px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 6px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 6px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #a1a1a1;
}

/* Tooltips personnalisés */
.tooltip-inner {
    background-color: rgba(0, 0, 0, 0.9);
    border-radius: 6px;
    font-size: 0.875rem;
}

/* Loading states */
.loading-skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .card {
        background-color: #2d3748;
        border-color: #4a5568;
    }
    
    .text-muted {
        color: #a0aec0 !important;
    }
    
    .table-light {
        background-color: #4a5568;
        color: #fff;
    }
    
    .bg-light {
        background-color: #4a5568 !important;
    }
}

/* Print styles */
@media print {
    .card {
        break-inside: avoid;
        box-shadow: none !important;
        border: 1px solid #ddd !important;
    }
    
    .btn, .dropdown {
        display: none !important;
    }
    
    .hero-section {
        background: #f8f9fa !important;
        color: #000 !important;
    }
    
    .chart-container {
        height: auto !important;
    }
}
</style>
@endsection