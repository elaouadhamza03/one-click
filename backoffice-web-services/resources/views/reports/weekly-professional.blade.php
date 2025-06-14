<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Rapport Hebdomadaire des Devis</title>
    <style>
        @page {
            margin: 15mm;
            size: A4;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            line-height: 1.5;
            color: #333333;
            font-size: 10pt;
        }
        
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 25px 0;
            border-bottom: 3px solid #4A90E2;
            position: relative;
        }
        
        .header-border {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #4A90E2;
        }
        
        .logo {
            font-size: 28pt;
            font-weight: bold;
            color: #4A90E2;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        
        .report-title {
            font-size: 20pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 6px;
        }
        
        .report-subtitle {
            font-size: 11pt;
            color: #666666;
            margin-bottom: 15px;
        }
        
        /* Period Info */
        .period-info {
            background-color: #F8F9FA;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #4A90E2;
            margin-bottom: 25px;
        }
        
        .period-title {
            font-size: 14pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 5px;
        }
        
        .period-dates {
            font-size: 12pt;
            color: #555555;
            font-weight: bold;
        }
        
        /* Meta Info */
        .meta-info {
            width: 100%;
            margin-bottom: 25px;
            border-collapse: collapse;
        }
        
        .meta-info td {
            background-color: #F8F9FA;
            padding: 10px 12px;
            border: 1px solid #E0E0E0;
            text-align: center;
            width: 33.33%;
        }
        
        .meta-label {
            font-size: 8pt;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
            display: block;
            margin-bottom: 2px;
        }
        
        .meta-value {
            font-size: 10pt;
            color: #333333;
            font-weight: bold;
        }
        
        /* Section Titles */
        .section-title {
            font-size: 16pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #E0E0E0;
        }
        
        /* Stats Grid */
        .stats-grid {
            width: 100%;
            margin-bottom: 25px;
            border-collapse: separate;
            border-spacing: 10px;
        }
        
        .stat-card {
            width: 33.33%;
            background-color: #FFFFFF;
            border: 2px solid #E0E0E0;
            border-radius: 8px;
            padding: 20px 15px;
            text-align: center;
            vertical-align: middle;
        }
        
        .stat-card.total {
            border-color: #4A90E2;
            background-color: #F0F7FF;
        }
        
        .stat-card.validated {
            border-color: #28A745;
            background-color: #F0FFF4;
        }
        
        .stat-card.rejected {
            border-color: #DC3545;
            background-color: #FFF5F5;
        }
        
        .stat-icon {
            width: 30px;
            height: 30px;
            margin: 0 auto 8px auto;
            border-radius: 50%;
            display: block;
            position: relative;
        }
        
        .stat-icon.total {
            background-color: #4A90E2;
        }
        
        .stat-icon.validated {
            background-color: #28A745;
        }
        
        .stat-icon.rejected {
            background-color: #DC3545;
        }
        
        .stat-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 15px;
            height: 15px;
            background-color: white;
            border-radius: 2px;
        }
        
        .stat-number {
            font-size: 32pt;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        
        .stat-card.total .stat-number {
            color: #4A90E2;
        }
        
        .stat-card.validated .stat-number {
            color: #28A745;
        }
        
        .stat-card.rejected .stat-number {
            color: #DC3545;
        }
        
        .stat-label {
            font-size: 11pt;
            font-weight: bold;
            color: #555555;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .stat-description {
            font-size: 8pt;
            color: #666666;
            margin-top: 3px;
        }
        
        /* Analysis Section */
        .analysis-section {
            background-color: #F8F9FA;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #E0E0E0;
            margin-bottom: 25px;
        }
        
        .analysis-title {
            font-size: 12pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 12px;
        }
        
        .analysis-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .analysis-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #D0D0D0;
        }
        
        .analysis-table tr:last-child td {
            border-bottom: none;
        }
        
        .analysis-label {
            background-color: #E8E8E8;
            font-weight: bold;
            color: #555555;
            width: 40%;
        }
        
        .analysis-value {
            background-color: #FFFFFF;
            color: #333333;
        }
        
        /* KPI Section */
        .kpi-section {
            margin-bottom: 25px;
        }
        
        .kpi-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px;
        }
        
        .kpi-item {
            width: 50%;
            background-color: #FFFFFF;
            border: 1px solid #E0E0E0;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
        }
        
        .kpi-title {
            font-size: 9pt;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 5px;
        }
        
        .kpi-value {
            font-size: 20pt;
            font-weight: bold;
            color: #4A90E2;
            margin-bottom: 3px;
        }
        
        .kpi-trend {
            font-size: 8pt;
            color: #555555;
        }
        
        /* Recommendations */
        .recommendations {
            background-color: #E8F5E8;
            border: 1px solid #28A745;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }
        
        .recommendations-title {
            font-size: 12pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 12px;
        }
        
        .recommendations ul {
            margin-left: 15px;
            color: #333333;
        }
        
        .recommendations li {
            margin-bottom: 6px;
            line-height: 1.4;
        }
        
        /* Executive Summary */
        .executive-summary {
            background-color: #F8F9FA;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #E0E0E0;
            margin-bottom: 25px;
        }
        
        .executive-summary h3 {
            font-size: 12pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 12px;
        }
        
        .executive-summary p {
            line-height: 1.6;
            color: #333333;
            margin-bottom: 10px;
        }
        
        .performance-positive {
            color: #155724;
            background-color: #D4EDDA;
            padding: 8px;
            border-radius: 4px;
            margin-top: 8px;
        }
        
        .performance-warning {
            color: #721C24;
            background-color: #F8D7DA;
            padding: 8px;
            border-radius: 4px;
            margin-top: 8px;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 2px solid #E0E0E0;
            text-align: center;
            color: #666666;
        }
        
        .footer-info {
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        .footer-note {
            font-size: 8pt;
            color: #999999;
        }
        
        /* Watermark */
        .watermark {
            position: fixed;
            bottom: 15mm;
            right: 15mm;
            font-size: 7pt;
            color: #E0E0E0;
            transform: rotate(-45deg);
            z-index: -1;
        }
        
        /* Status Indicators */
        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 5px;
            vertical-align: middle;
        }
        
        .status-indicator.success {
            background-color: #28A745;
        }
        
        .status-indicator.warning {
            background-color: #FFC107;
        }
        
        .status-indicator.danger {
            background-color: #DC3545;
        }
        
        /* Page break helpers */
        .page-break {
            page-break-before: always;
        }
        
        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <!-- En-tête du rapport -->
    <div class="header no-break">
        <div class="header-border"></div>
        <div class="logo">OneClick Services</div>
        <h1 class="report-title">Rapport Hebdomadaire</h1>
        <p class="report-subtitle">Analyse des Demandes de Devis</p>
    </div>
    
    <!-- Informations sur la période -->
    <div class="period-info no-break">
        <h2 class="period-title">PERIODE D'ANALYSE</h2>
        <p class="period-dates">Du {{ $start_date }} au {{ $end_date }}</p>
    </div>
    
    <!-- Métadonnées du rapport -->
    <table class="meta-info no-break">
        <tr>
            <td>
                <span class="meta-label">Généré le</span>
                <span class="meta-value">{{ now()->format('d/m/Y') }}</span>
            </td>
            <td>
                <span class="meta-label">Heure</span>
                <span class="meta-value">{{ now()->format('H:i') }}</span>
            </td>
            <td>
                <span class="meta-label">Version</span>
                <span class="meta-value">v2.1</span>
            </td>
        </tr>
    </table>
    
    <!-- Section des statistiques principales -->
    <div class="stats-section no-break">
        <h2 class="section-title">STATISTIQUES PRINCIPALES</h2>
        
        <table class="stats-grid">
            <tr>
                <td class="stat-card total">
                    <div class="stat-icon total"></div>
                    <span class="stat-number">{{ $total_devis }}</span>
                    <div class="stat-label">Total Devis</div>
                    <div class="stat-description">Toutes demandes confondues</div>
                </td>
                
                <td class="stat-card validated">
                    <div class="stat-icon validated"></div>
                    <span class="stat-number">{{ $validated_devis }}</span>
                    <div class="stat-label">Validés</div>
                    <div class="stat-description">Projets acceptés</div>
                </td>
                
                <td class="stat-card rejected">
                    <div class="stat-icon rejected"></div>
                    <span class="stat-number">{{ $rejected_devis }}</span>
                    <div class="stat-label">Refusés</div>
                    <div class="stat-description">Projets non retenus</div>
                </td>
            </tr>
        </table>
    </div>
    
    <!-- Analyse détaillée -->
    <div class="analysis-section no-break">
        <h3 class="analysis-title">ANALYSE DETAILLEE</h3>
        <table class="analysis-table">
            <tr>
                <td class="analysis-label">Taux de validation</td>
                <td class="analysis-value">
                    @php
                        $validation_rate = $total_devis > 0 ? round(($validated_devis / $total_devis) * 100, 1) : 0;
                    @endphp
                    {{ $validation_rate }}% ({{ $validated_devis }}/{{ $total_devis }})
                    <span class="status-indicator {{ $validation_rate >= 60 ? 'success' : ($validation_rate >= 40 ? 'warning' : 'danger') }}"></span>
                </td>
            </tr>
            <tr>
                <td class="analysis-label">Taux de rejet</td>
                <td class="analysis-value">
                    @php
                        $rejection_rate = $total_devis > 0 ? round(($rejected_devis / $total_devis) * 100, 1) : 0;
                    @endphp
                    {{ $rejection_rate }}% ({{ $rejected_devis }}/{{ $total_devis }})
                </td>
            </tr>
            <tr>
                <td class="analysis-label">Devis en attente</td>
                <td class="analysis-value">
                    @php
                        $pending_devis = $total_devis - $validated_devis - $rejected_devis;
                        $pending_rate = $total_devis > 0 ? round(($pending_devis / $total_devis) * 100, 1) : 0;
                    @endphp
                    {{ $pending_devis }} ({{ $pending_rate }}%)
                </td>
            </tr>
            <tr>
                <td class="analysis-label">Moyenne quotidienne</td>
                <td class="analysis-value">{{ round($total_devis / 7, 1) }} devis/jour</td>
            </tr>
        </table>
    </div>
    
    <!-- Indicateurs de performance -->
    <div class="kpi-section no-break">
        <h2 class="section-title">INDICATEURS DE PERFORMANCE</h2>
        
        <table class="kpi-table">
            <tr>
                <td class="kpi-item">
                    <div class="kpi-title">Objectif Hebdomadaire</div>
                    <div class="kpi-value">10</div>
                    <div class="kpi-trend">
                        @if($total_devis >= 10)
                            Objectif atteint
                        @else
                            {{ 10 - $total_devis }} devis manquants
                        @endif
                    </div>
                </td>
                
                <td class="kpi-item">
                    <div class="kpi-title">Performance</div>
                    <div class="kpi-value">{{ round(($total_devis / 10) * 100) }}%</div>
                    <div class="kpi-trend">Par rapport à l'objectif</div>
                </td>
            </tr>
        </table>
    </div>
    
    <!-- Recommandations -->
    @if($total_devis > 0)
    <div class="recommendations no-break">
        <h3 class="recommendations-title">RECOMMANDATIONS STRATEGIQUES</h3>
        <ul>
            @if($validation_rate < 50)
                <li><strong>Améliorer le taux de validation :</strong> Analyser les causes de rejet pour optimiser les propositions commerciales</li>
            @endif
            
            @if($pending_devis > 5)
                <li><strong>Traitement des devis en attente :</strong> {{ $pending_devis }} devis nécessitent une attention immédiate</li>
            @endif
            
            @if($total_devis < 10)
                <li><strong>Générer plus de leads :</strong> Intensifier les actions marketing pour atteindre l'objectif de 10 devis/semaine</li>
            @endif
            
            @if($validation_rate >= 70)
                <li><strong>Excellent taux de validation :</strong> Capitaliser sur cette performance en augmentant le volume de prospects</li>
            @endif
            
            <li><strong>Suivi client :</strong> Mettre en place un système de relance pour les devis validés</li>
            <li><strong>Analyse concurrentielle :</strong> Étudier les projets refusés pour identifier les axes d'amélioration</li>
        </ul>
    </div>
    @endif
    
    <!-- Summary exécutif -->
    <div class="executive-summary">
        <h3>RESUME EXECUTIF</h3>
        <p>
            Cette semaine du {{ $start_date }} au {{ $end_date }}, nous avons enregistré 
            <strong>{{ $total_devis }} {{ $total_devis > 1 ? 'nouvelles demandes' : 'nouvelle demande' }} de devis</strong>.
            
            @if($total_devis > 0)
                Sur ces demandes, <strong>{{ $validated_devis }} {{ $validated_devis > 1 ? 'ont été validées' : 'a été validée' }}</strong> 
                ({{ $validation_rate }}%) et <strong>{{ $rejected_devis }} {{ $rejected_devis > 1 ? 'ont été refusées' : 'a été refusée' }}</strong> 
                ({{ $rejection_rate }}%).
                
                @if($pending_devis > 0)
                    <strong>{{ $pending_devis }} {{ $pending_devis > 1 ? 'demandes restent' : 'demande reste' }} en attente</strong> de traitement.
                @endif
            @else
                Aucune nouvelle demande n'a été reçue cette semaine. Il est recommandé d'intensifier les efforts de prospection.
            @endif
        </p>
        
        @if($validation_rate >= 60)
            <p class="performance-positive">
                <strong>PERFORMANCE POSITIVE :</strong> Le taux de validation de {{ $validation_rate }}% est satisfaisant et témoigne d'une bonne adéquation entre nos services et les besoins clients.
            </p>
        @elseif($validation_rate < 40)
            <p class="performance-warning">
                <strong>ATTENTION REQUISE :</strong> Le taux de validation de {{ $validation_rate }}% nécessite une analyse approfondie pour identifier les axes d'amélioration.
            </p>
        @endif
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <div class="footer-info">
            <strong>OneClick Services</strong> - Back-Office Web Services<br>
            Rapport généré automatiquement le {{ now()->format('d/m/Y à H:i') }}
        </div>
        <div class="footer-note">
            Ce document est confidentiel et destiné à un usage interne uniquement.<br>
            Pour toute question, contactez l'équipe de direction.
        </div>
    </div>
    
    <!-- Watermark -->
    <div class="watermark">CONFIDENTIEL</div>
</body>
</html>