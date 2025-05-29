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
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.89 22 5.99 22H18C19.1 22 20 21.1 20 20V8L14 2Z" fill="currentColor"/>
                                    <path d="M14 2V8H20" fill="none" stroke="white" stroke-width="2"/>
                                </svg>
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
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" fill="currentColor"/>
                                    <polyline points="12,6 12,12 16,14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
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

        <!-- Demandes Acceptées -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card stats-card border-0 shadow-sm h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="stats-icon bg-success-soft rounded-3 p-3 mb-3">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.7088 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4905 2.02168 11.3363C2.16356 9.18203 2.99721 7.13214 4.39828 5.49883C5.79935 3.86551 7.69279 2.72636 9.79619 2.24223C11.8996 1.75809 14.1003 1.95185 16.07 2.79999" fill="currentColor"/>
                                    <polyline points="22,4 12,14.01 9,11.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2 tracking-wide">
                                Demandes Acceptées
                            </h6>
                            <h2 class="fw-bold text-dark mb-0 counter">{{ $validatedQuotes }}</h2>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 4px;">
                        <div class="progress-bar bg-success" style="width: 85%"></div>
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
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2"/>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" fill="none" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2 tracking-wide">
                                Services Actifs
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
    </div>

    <!-- Graphiques améliorés -->
    <div class="row g-4 mb-5">
        <!-- Statut des devis -->
        <div class="col-xl-6 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="fw-bold text-dark mb-1">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-primary me-2">
                                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83" fill="none" stroke="currentColor" stroke-width="2"/>
                                    <path d="M22 12A5 5 0 0 0 13 7" fill="currentColor"/>
                                </svg>
                                Répartition des Devis
                            </h5>
                            <p class="text-muted small mb-0">Analyse des statuts actuels</p>
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
                            <h5 class="fw-bold text-dark mb-1">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-primary me-2">
                                    <polyline points="22,12 18,12 15,21 9,3 6,12 2,12" fill="none" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                Évolution des Devis
                            </h5>
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
                            <h5 class="fw-bold text-dark mb-1">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-primary me-2">
                                    <polyline points="22,12 16,12 14,15 10,15 8,12 2,12" fill="none" stroke="currentColor" stroke-width="2"/>
                                    <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" fill="none" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                Demandes de Devis Récentes
                            </h5>
                            <p class="text-muted small mb-0">Gestion des nouvelles demandes</p>
                        </div>
                        <div class="col-auto">
                            <a href="{{ backpack_url('quote') }}" class="btn btn-primary btn-sm px-4">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                    <line x1="8" y1="6" x2="21" y2="6" stroke="currentColor" stroke-width="2"/>
                                    <line x1="8" y1="12" x2="21" y2="12" stroke="currentColor" stroke-width="2"/>
                                    <line x1="8" y1="18" x2="21" y2="18" stroke="currentColor" stroke-width="2"/>
                                    <line x1="3" y1="6" x2="3.01" y2="6" stroke="currentColor" stroke-width="2"/>
                                    <line x1="3" y1="12" x2="3.01" y2="12" stroke="currentColor" stroke-width="2"/>
                                    <line x1="3" y1="18" x2="3.01" y2="18" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                Voir tous les devis
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($recentQuotes->count() > 0)
                        <div class="table-container">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 fw-semibold py-3">Client</th>
                                        <th class="border-0 fw-semibold py-3">Email</th>
                                        <th class="border-0 fw-semibold py-3 d-none d-md-table-cell">Demande</th>
                                        <th class="border-0 fw-semibold py-3">Statut</th>
                                        <th class="border-0 fw-semibold py-3 d-none d-lg-table-cell">Date</th>
                                        <th class="border-0 fw-semibold py-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentQuotes as $quote)
                                        <tr class="table-row-hover">
                                            <td class="py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="client-initial bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-weight: 600;">
                                                        {{ strtoupper(substr($quote->nom, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <span class="fw-semibold text-dark">{{ $quote->nom }}</span>
                                                        <div class="text-muted small d-block d-md-none">{{ $quote->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 text-muted d-none d-md-table-cell">
                                                <span class="email-text">{{ $quote->email }}</span>
                                            </td>
                                            <td class="py-3 d-none d-md-table-cell">
                                                <span class="text-truncate d-block" style="max-width: 250px;" title="{{ $quote->message }}">
                                                    {{ Str::limit($quote->message, 60) }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                @switch($quote->status)
                                                    @case('en_attente')
                                                        <span class="badge bg-warning-soft text-warning px-3 py-2 rounded-pill">
                                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                                                <circle cx="12" cy="12" r="10" fill="currentColor"/>
                                                                <polyline points="12,6 12,12 16,14" stroke="white" stroke-width="2"/>
                                                            </svg>
                                                            En attente
                                                        </span>
                                                        @break
                                                    @case('valide')
                                                        <span class="badge bg-success-soft text-success px-3 py-2 rounded-pill">
                                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.7088 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4905 2.02168 11.3363C2.16356 9.18203 2.99721 7.13214 4.39828 5.49883C5.79935 3.86551 7.69279 2.72636 9.79619 2.24223C11.8996 1.75809 14.1003 1.95185 16.07 2.79999" fill="currentColor"/>
                                                                <polyline points="22,4 12,14.01 9,11.01" stroke="white" stroke-width="2"/>
                                                            </svg>
                                                            Validé
                                                        </span>
                                                        @break
                                                    @case('refuse')
                                                        <span class="badge bg-danger-soft text-danger px-3 py-2 rounded-pill">
                                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                                                <circle cx="12" cy="12" r="10" fill="currentColor"/>
                                                                <line x1="15" y1="9" x2="9" y2="15" stroke="white" stroke-width="2"/>
                                                                <line x1="9" y1="9" x2="15" y2="15" stroke="white" stroke-width="2"/>
                                                            </svg>
                                                            Refusé
                                                        </span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td class="py-3 text-muted d-none d-lg-table-cell">
                                                <small>{{ $quote->created_at->format('d/m/Y') }}</small>
                                                <div class="text-muted" style="font-size: 0.75rem;">{{ $quote->created_at->format('H:i') }}</div>
                                            </td>
                                            <td class="py-3 text-center">
                                                <a href="{{ backpack_url('quote/'.$quote->id.'/show') }}" 
                                                   class="btn btn-outline-primary btn-sm rounded-pill px-3" 
                                                   title="Consulter le devis">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" fill="none" stroke="currentColor" stroke-width="2"/>
                                                        <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2"/>
                                                    </svg>
                                                    <span class="d-none d-sm-inline">Voir</span>
                                                </a>
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
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-muted">
                                        <polyline points="22,12 16,12 14,15 10,15 8,12 2,12" fill="none" stroke="currentColor" stroke-width="2"/>
                                        <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" fill="none" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </div>
                                <h6 class="fw-semibold text-dark mb-2">Aucune demande de devis</h6>
                                <p class="text-muted mb-4">Les nouvelles demandes apparaîtront ici automatiquement.</p>
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
                    <h5 class="fw-bold text-dark mb-1">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-primary me-2">
                            <polygon points="13,2 3,14 12,14 11,22 21,10 12,10 13,2" fill="currentColor"/>
                        </svg>
                        Actions Rapides
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ backpack_url('service/create') }}" class="action-card text-decoration-none d-block">
                                <div class="card border-0 bg-info-soft h-100 hover-lift-action">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-info text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="12" y1="5" x2="12" y2="19" stroke="currentColor" stroke-width="3"/>
                                                <line x1="5" y1="12" x2="19" y2="12" stroke="currentColor" stroke-width="3"/>
                                            </svg>
                                        </div>
                                        <h6 class="fw-bold text-info mb-2">Nouveau Service</h6>
                                        <p class="text-muted small mb-0">Créer un nouveau service pour vos clients</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ backpack_url('project/create') }}" class="action-card text-decoration-none d-block">
                                <div class="card border-0 bg-success-soft h-100 hover-lift-action">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-success text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="12" y1="5" x2="12" y2="19" stroke="currentColor" stroke-width="3"/>
                                                <line x1="5" y1="12" x2="19" y2="12" stroke="currentColor" stroke-width="3"/>
                                            </svg>
                                        </div>
                                        <h6 class="fw-bold text-success mb-2">Nouvelle Réalisation</h6>
                                        <p class="text-muted small mb-0">Ajouter un projet à votre portfolio</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ backpack_url('setting') }}" class="action-card text-decoration-none d-block">
                                <div class="card border-0 bg-secondary-soft h-100 hover-lift-action">
                                    <div class="card-body text-center p-4">
                                        <div class="action-icon bg-secondary text-white rounded-3 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2"/>
                                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" fill="none" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                        </div>
                                        <h6 class="fw-bold text-secondary mb-2">Configuration</h6>
                                        <p class="text-muted small mb-0">Gérer les paramètres du système</p>
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
Chart.defaults.font.family = "'Inter', -apple-system, BlinkMacSystemFont, sans-serif";
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
            cutout: '65%',
            hoverOffset: 8
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
                backgroundColor: 'rgba(0, 0, 0, 0.85)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 12,
                displayColors: false,
                padding: 12,
                titleFont: {
                    size: 14,
                    weight: '600'
                },
                bodyFont: {
                    size: 13
                }
            }
        },
        elements: {
            arc: {
                borderWidth: 0
            }
        },
        animation: {
            animateRotate: true,
            duration: 1500
        }
    }
});

// Point d'animation pour le graphique circulaire
setTimeout(() => {
    quotesChart.update();
}, 100);

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

// Créer un gradient pour le graphique linéaire
const gradient = ctx2.createLinearGradient(0, 0, 0, 300);
gradient.addColorStop(0, 'rgba(13, 110, 253, 0.15)');
gradient.addColorStop(1, 'rgba(13, 110, 253, 0.01)');

const monthlyChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: monthlyLabels.reverse(),
        datasets: [{
            label: 'Nombre de devis',
            data: monthlyCounts.reverse(),
            borderColor: '#0d6efd',
            backgroundColor: gradient,
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#0d6efd',
            pointBorderColor: '#fff',
            pointBorderWidth: 3,
            pointRadius: 6,
            pointHoverRadius: 10,
            pointHoverBackgroundColor: '#0d6efd',
            pointHoverBorderColor: '#fff',
            pointHoverBorderWidth: 3
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
                },
                ticks: {
                    color: '#6c757d',
                    font: {
                        size: 12
                    }
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)',
                    drawBorder: false
                },
                border: {
                    display: false
                },
                ticks: {
                    stepSize: 1,
                    color: '#6c757d',
                    font: {
                        size: 12
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.85)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 12,
                displayColors: false,
                padding: 12,
                titleFont: {
                    size: 14,
                    weight: '600'
                },
                bodyFont: {
                    size: 13
                }
            }
        },
        animation: {
            duration: 2000,
            easing: 'easeInOutQuart'
        }
    }
});

// Animation pour les compteurs
function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.textContent);
                let current = 0;
                const increment = target / 30;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 50);
                observer.unobserve(counter);
            }
        });
    });
    
    counters.forEach(counter => observer.observe(counter));
}

// Déclencher les animations au chargement
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        animateCounters();
    }, 300);
    
    // Animation de fade-in pour les cartes
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});

// Amélioration de l'interaction avec les lignes du tableau
document.addEventListener('DOMContentLoaded', function() {
    const tableRows = document.querySelectorAll('.table-row-hover');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
            this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
            this.style.transition = 'all 0.3s ease';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });
});
</script>
@endsection

@section('after_styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Variables CSS pour la cohérence des couleurs */
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
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Font global avec fallbacks appropriés */
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f7f8fc;
    line-height: 1.6;
}

/* Header gradient avec animation */
.bg-gradient-primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, #4c6ef5 100%);
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
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    z-index: 1;
}

.hero-section::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -5%;
    width: 150px;
    height: 150px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    z-index: 1;
}

/* Cartes de statistiques améliorées */
.stats-card {
    transition: var(--transition);
    border: 1px solid rgba(0, 0, 0, 0.04) !important;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
}

.hover-lift:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
}

.hover-lift-action:hover {
    transform: translateY(-4px);
    box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1) !important;
}

/* Icônes de statistiques */
.stats-icon {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.stats-card:hover .stats-icon {
    transform: scale(1.1) rotate(5deg);
}

/* Couleurs soft avec transparence */
.bg-primary-soft {
    background-color: rgba(13, 110, 253, 0.12) !important;
}

.bg-success-soft {
    background-color: rgba(25, 135, 84, 0.12) !important;
}

.bg-warning-soft {
    background-color: rgba(255, 193, 7, 0.12) !important;
}

.bg-danger-soft {
    background-color: rgba(220, 53, 69, 0.12) !important;
}

.bg-info-soft {
    background-color: rgba(13, 202, 240, 0.12) !important;
}

.bg-secondary-soft {
    background-color: rgba(108, 117, 125, 0.12) !important;
}

/* Text colors avec contraste amélioré */
.text-primary { color: var(--primary-color) !important; }
.text-success { color: var(--success-color) !important; }
.text-warning { color: #f57c00 !important; }
.text-danger { color: var(--danger-color) !important; }
.text-info { color: #0288d1 !important; }

/* Espacement et typographie */
.tracking-wide {
    letter-spacing: 0.05em;
}

.display-6 {
    font-weight: 700;
    letter-spacing: -0.02em;
}

/* Légende du graphique améliorée */
.legend-color {
    width: 20px;
    height: 20px;
    transition: var(--transition);
}

.legend-item:hover .legend-color {
    transform: scale(1.2);
}

.legend-item {
    text-align: center;
    padding: 0.5rem;
    border-radius: 8px;
    transition: var(--transition);
}

.legend-item:hover {
    background-color: rgba(0, 0, 0, 0.02);
}

/* Container des graphiques */
.chart-container {
    position: relative;
    height: 280px;
}

/* Tableau moderne */
.table {
    border-collapse: separate;
    border-spacing: 0;
}

.table-hover tbody tr {
    transition: var(--transition);
    border-radius: 8px;
}

.table-hover tbody tr:hover {
    background-color: rgba(13, 110, 253, 0.04);
    transform: translateX(2px);
}

.table-row-hover {
    cursor: pointer;
}

/* Initiales des clients */
.client-initial {
    font-size: 0.875rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--primary-color), #4c6ef5);
    box-shadow: 0 2px 8px rgba(13, 110, 253, 0.3);
}

/* Badges modernes */
.badge {
    font-weight: 600;
    font-size: 0.75rem;
    padding: 0.5rem 0.875rem;
    border-radius: 50px;
    border: 1px solid transparent;
    transition: var(--transition);
}

.badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.rounded-pill {
    border-radius: 50px !important;
}

/* Cartes d'actions */
.action-card {
    display: block;
    transition: var(--transition);
    text-decoration: none !important;
}

.action-icon {
    transition: var(--transition);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.action-card:hover .action-icon {
    transform: scale(1.15) rotate(-5deg);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
}

/* État vide amélioré */
.empty-state {
    padding: 3rem 1rem;
}

.empty-icon {
    transition: var(--transition);
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.empty-state:hover .empty-icon {
    transform: scale(1.05) rotate(2deg);
}

/* Buttons avec animations */
.btn {
    border-radius: 8px;
    font-weight: 600;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.btn:hover::before {
    left: 100%;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    border-radius: 8px;
}

.rounded-pill.btn {
    border-radius: 50px !important;
}

/* Cards avec glassmorphism */
.card {
    border-radius: var(--border-radius);
    transition: var(--transition);
    border: 1px solid rgba(255, 255, 255, 0.18);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
}

.card-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    background-color: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
}

/* Progress bars sans animation de défilement */
.progress-bar {
    border-radius: 8px;
    transition: width 0.6s ease-in-out;
    position: relative;
}

/* Suppression de l'animation de défilement */
.progress-bar::after {
    display: none;
}

/* Email sur une seule ligne */
.email-text {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
}

/* Responsive pour 4 colonnes */
@media (max-width: 1200px) {
    .col-xl-3 {
        margin-bottom: 1.5rem;
    }
}

@media (max-width: 992px) {
    .col-xl-3.col-lg-6 {
        margin-bottom: 1.5rem;
    }
}

/* Responsive Design Avancé */
@media (max-width: 1200px) {
    .hero-section h1 {
        font-size: 2rem;
    }
    
    .chart-container {
        height: 250px;
    }
}

@media (max-width: 992px) {
    .hero-section {
        text-align: center;
    }
    
    .hero-section .col-md-4 {
        margin-top: 1.5rem;
    }
    
    .dashboard-stats-mini {
        text-align: center !important;
    }
    
    .stats-card .stats-icon {
        width: 60px;
        height: 60px;
    }
    
    .action-icon {
        width: 55px !important;
        height: 55px !important;
    }
}

@media (max-width: 768px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .hero-section {
        margin-bottom: 2rem !important;
        padding: 2rem !important;
    }
    
    .display-6 {
        font-size: 1.5rem;
    }
    
    .stats-card .card-body {
        padding: 1.5rem !important;
    }
    
    .chart-container {
        height: 200px;
    }
    
    .table-responsive {
        font-size: 0.875rem;
        border-radius: 8px;
    }
    
    .client-initial {
        width: 32px !important;
        height: 32px !important;
        font-size: 0.75rem;
    }
    
    .badge {
        font-size: 0.7rem;
        padding: 0.375rem 0.75rem;
    }
}

@media (max-width: 576px) {
    .hero-section h1 {
        font-size: 1.25rem;
    }
    
    .lead {
        font-size: 0.95rem;
    }
    
    .stats-card .stats-icon {
        width: 50px;
        height: 50px;
    }
    
    .stats-card .stats-icon i {
        font-size: 1.25rem !important;
    }
    
    .action-card .action-icon {
        width: 45px !important;
        height: 45px !important;
    }
    
    .action-card .action-icon i {
        font-size: 0.875rem !important;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.8rem;
    }
}

/* Animations avec respect des préférences utilisateur */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
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
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Classes utilitaires d'animation */
.fade-in-up {
    animation: fadeInUp 0.8s ease-out;
}

.slide-in-right {
    animation: slideInRight 0.6s ease-out;
}

/* Améliorations d'accessibilité */
.btn:focus,
.btn.focus {
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    outline: none;
}

.card:focus-within {
    box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.25);
}

/* Progress bars modernes sans animation */
.progress {
    border-radius: 8px;
    background-color: rgba(0, 0, 0, 0.06);
    overflow: hidden;
}
.table-container {
    overflow: hidden;
}

.table-container table {
    width: 100%;
    table-layout: fixed;
}

.table-container table td {
    word-wrap: break-word;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Icônes SVG avec couleurs appropriées */
.stats-icon svg {
    color: inherit;
}

.text-primary svg {
    color: var(--primary-color);
}

.text-warning svg {
    color: #f57c00;
}

.text-success svg {
    color: var(--success-color);
}

/* Responsive pour les nouvelles statistiques */
@media (max-width: 992px) {
    .col-lg-4 {
        margin-bottom: 1.5rem;
    }
}

/* Tooltips personnalisés */
.tooltip-inner {
    background-color: rgba(0, 0, 0, 0.9);
    border-radius: 8px;
    font-size: 0.875rem;
    padding: 0.5rem 0.75rem;
}

/* États de chargement */
.loading-skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
    border-radius: 8px;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

/* Support du mode sombre */
@media (prefers-color-scheme: dark) {
    body {
        background-color: #1a1d23;
        color: #e9ecef;
    }
    
    .card {
        background-color: rgba(45, 55, 72, 0.95);
        border-color: #4a5568;
        color: #e9ecef;
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
    
    .hero-section {
        background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
    }
}

/* Styles d'impression */
@media print {
    body {
        background: white !important;
    }
    
    .card {
        break-inside: avoid;
        box-shadow: none !important;
        border: 1px solid #ddd !important;
        background: white !important;
    }
    
    .btn, .dropdown, .action-card {
        display: none !important;
    }
    
    .hero-section {
        background: #f8f9fa !important;
        color: #000 !important;
    }
    
    .chart-container {
        height: auto !important;
    }
    
    .table {
        font-size: 0.8rem;
    }
    
    .badge {
        border: 1px solid #000 !important;
        background: transparent !important;
        color: #000 !important;
    }
}

/* Améliorations de performance */
.stats-card,
.action-card,
.table-row-hover {
    will-change: transform;
}

/* Micro-interactions */
.client-initial:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
}

.legend-item:hover {
    transform: translateY(-2px);
}

/* Focus visible pour l'accessibilité */
.btn:focus-visible,
.action-card:focus-visible {
    outline: 2px solid var(--primary-color);
    outline-offset: 2px;
}

/* Optimisations pour les écrans haute résolution */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .stats-icon,
    .action-icon,
    .client-initial {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
}
</style>
@endsection