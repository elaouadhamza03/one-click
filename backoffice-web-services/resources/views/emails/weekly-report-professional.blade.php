<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau rapport hebdomadaire disponible</title>
    <style>
        /* Reset et base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #2d3748;
            background-color: #f7fafc;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .header .subtitle {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .report-icon {
            display: inline-block;
            width: 70px;
            height: 70px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-bottom: 20px;
            line-height: 70px;
            font-size: 30px;
        }
        
        /* Content */
        .content {
            padding: 40px 30px;
        }
        
        .notification-box {
            background: linear-gradient(135deg, #f6f9fc, #e9ecef);
            border-left: 4px solid #667eea;
            padding: 25px;
            border-radius: 0 12px 12px 0;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .notification-title {
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
        }
        
        .notification-text {
            color: #4a5568;
            font-size: 16px;
            line-height: 1.6;
        }
        
        /* Info Section */
        .info-section {
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        
        .info-grid {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            padding: 12px 15px;
            background-color: #e2e8f0;
            font-weight: 600;
            color: #4a5568;
            border-bottom: 1px solid #cbd5e0;
            width: 40%;
        }
        
        .info-value {
            display: table-cell;
            padding: 12px 15px;
            background-color: #ffffff;
            color: #2d3748;
            border-bottom: 1px solid #cbd5e0;
        }
        
        .info-row:last-child .info-label,
        .info-row:last-child .info-value {
            border-bottom: none;
        }
        
        /* Quick Stats */
        .quick-stats {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
            margin: 25px 0;
        }
        
        .stats-row {
            display: table-row;
        }
        
        .stat-item {
            display: table-cell;
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            vertical-align: middle;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            display: block;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Attachment Section */
        .attachment-section {
            background: linear-gradient(135deg, #e6fffa, #b2f5ea);
            border: 1px solid #38b2ac;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            margin: 30px 0;
        }
        
        .attachment-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #2c7a7b;
        }
        
        .attachment-title {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
        }
        
        .attachment-text {
            color: #4a5568;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .btn-download {
            display: inline-block;
            background: linear-gradient(135deg, #38b2ac, #2c7a7b);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(56, 178, 172, 0.3);
        }
        
        /* Action Button */
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            margin: 0 10px 10px 0;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        .cta-button.secondary {
            background: linear-gradient(135deg, #718096, #4a5568);
            box-shadow: 0 4px 15px rgba(113, 128, 150, 0.3);
        }
        
        /* Footer */
        .footer {
            background-color: #2d3748;
            color: #a0aec0;
            padding: 30px;
            text-align: center;
        }
        
        .footer-logo {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 15px;
        }
        
        .footer-text {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
        
        .footer-link {
            color: #667eea;
            text-decoration: none;
        }
        
        .footer-link:hover {
            color: #764ba2;
        }
        
        /* Responsive */
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .header, .content, .footer {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .quick-stats, .stats-row {
                display: block;
            }
            
            .stat-item {
                display: block;
                margin-bottom: 10px;
            }
            
            .info-grid, .info-row {
                display: block;
            }
            
            .info-label, .info-value {
                display: block;
                width: 100%;
                border-bottom: none;
            }
            
            .info-label {
                border-radius: 4px 4px 0 0;
                margin-bottom: 0;
            }
            
            .info-value {
                border-radius: 0 0 4px 4px;
                border-top: 1px solid #e2e8f0;
            }
            
            .cta-button {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="report-icon">📊</div>
            <h1>Nouveau Rapport Disponible</h1>
            <p class="subtitle">Rapport hebdomadaire des devis généré</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <!-- Notification principale -->
            <div class="notification-box">
                <div class="notification-title">📋 Rapport Hebdomadaire Généré</div>
                <div class="notification-text">
                    Le rapport d'analyse des devis pour la période du <strong>{{ $startDate }}</strong> au <strong>{{ $endDate }}</strong> 
                    est maintenant disponible en pièce jointe.
                </div>
            </div>
            
            <!-- Informations du rapport -->
            <div class="info-section">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">📅 Période analysée</div>
                        <div class="info-value">{{ $startDate }} - {{ $endDate }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">🕐 Généré le</div>
                        <div class="info-value">{{ $generatedAt->format('d/m/Y à H:i') }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">📄 Format</div>
                        <div class="info-value">PDF détaillé avec analyses</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">🔢 Version</div>
                        <div class="info-value">{{ $reportVersion ?? 'v2.1' }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Statistiques rapides -->
            <div class="quick-stats">
                <div class="stats-row">
                    <div class="stat-item">
                        <span class="stat-number">{{ $totalDevis }}</span>
                        <div class="stat-label">Total Devis</div>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-number">{{ $validatedDevis }}</span>
                        <div class="stat-label">Validés</div>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-number">{{ $rejectedDevis }}</span>
                        <div class="stat-label">Refusés</div>
                    </div>
                </div>
            </div>
            
            <!-- Section pièce jointe -->
            <div class="attachment-section">
                <div class="attachment-icon">📎</div>
                <h3 class="attachment-title">Rapport Complet en Pièce Jointe</h3>
                <p class="attachment-text">
                    Le rapport PDF complet contient toutes les analyses détaillées, graphiques, 
                    KPIs et recommandations stratégiques pour la semaine écoulée.
                </p>
                <div style="color: #2c7a7b; font-weight: 600; margin-top: 10px;">
                    📄 rapport-hebdomadaire-{{ $startDate }}-{{ $endDate }}.pdf
                </div>
            </div>
            
            <!-- Boutons d'action -->
            <div class="cta-section">
                @if(isset($dashboardUrl))
                    <a href="{{ $dashboardUrl }}" class="cta-button">
                        📊 Voir le Dashboard
                    </a>
                @endif
                
                @if(isset($quotesUrl))
                    <a href="{{ $quotesUrl }}" class="cta-button secondary">
                        📋 Gérer les Devis
                    </a>
                @endif
            </div>
            
            <!-- Note informative -->
            <div style="background-color: #f1f3f4; padding: 20px; border-radius: 8px; margin: 25px 0; text-align: center;">
                <h4 style="color: #2d3748; font-size: 16px; margin-bottom: 10px;">
                    💡 Rappel
                </h4>
                <p style="color: #4a5568; line-height: 1.6; margin: 0;">
                    Ce rapport est généré automatiquement chaque lundi à 8h00.<br>
                    Consultez le PDF en pièce jointe pour l'analyse complète et les recommandations.
                </p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">OneClick Services</div>
            <p class="footer-text">
                Back-Office Web Services - Rapports automatisés
            </p>
            <p class="footer-text">
                📧 Email automatique - Ne pas répondre<br>
                🔗 <a href="#" class="footer-link">Accéder au back-office</a>
            </p>
            <p style="font-size: 12px; margin-top: 15px; color: #718096;">
                © {{ date('Y') }} OneClick Services. Tous droits réservés.<br>
                Rapport confidentiel - Usage interne uniquement weekly-report.blade
            </p>
        </div>
    </div>
</body>
</html>