<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande de devis</title>
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
        
        .header .icon {
            display: inline-block;
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-bottom: 20px;
            line-height: 60px;
            font-size: 24px;
        }
        
        /* Content */
        .content {
            padding: 40px 30px;
        }
        
        .alert-box {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
            font-size: 18px;
        }
        
        .info-section {
            margin-bottom: 30px;
        }
        
        .info-section h2 {
            color: #2d3748;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
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
            background-color: #f7fafc;
            padding: 15px 20px;
            font-weight: 600;
            color: #4a5568;
            border-bottom: 1px solid #e2e8f0;
            width: 35%;
        }
        
        .info-value {
            display: table-cell;
            padding: 15px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            color: #2d3748;
        }
        
        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }
        
        .message-box h3 {
            color: #2d3748;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .message-content {
            color: #4a5568;
            line-height: 1.6;
            font-style: italic;
        }
        
        .action-section {
            background: linear-gradient(135deg, #f6f9fc, #e9ecef);
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
        }
        
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
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
            
            .info-grid {
                display: block;
            }
            
            .info-row {
                display: block;
                margin-bottom: 15px;
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
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="icon">📧</div>
            <h1>Nouvelle Demande de Devis</h1>
            <p class="subtitle">Une nouvelle demande nécessite votre attention</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <div class="alert-box">
                🚨 Nouvelle demande reçue - Action requise
            </div>
            
            <div class="info-section">
                <h2>📋 Détails du Client</h2>
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">👤 Nom du client</div>
                        <div class="info-value">{{ $clientName }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">📧 Email</div>
                        <div class="info-value">{{ $clientEmail }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">🔢 Numéro de devis</div>
                        <div class="info-value">#{{ $quoteId }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">📅 Date de réception</div>
                        <div class="info-value">{{ now()->format('d/m/Y à H:i') }}</div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h2>💬 Message du Client</h2>
                <div class="message-box">
                    <h3>Demande détaillée :</h3>
                    <div class="message-content">
                        "{{ is_string($message) ? $message : 'Aucun message fourni' }}"
                    </div>
                </div>
            </div>
            
            <div class="action-section">
                <p style="margin-bottom: 20px; color: #4a5568; font-size: 16px;">
                    <strong>⏰ Action immédiate recommandée</strong><br>
                    Répondez rapidement pour maintenir un excellent service client
                </p>
                <a href="#" class="btn">
                    🔗 Accéder au Back-Office
                </a>
            </div>
            
            <div style="background-color: #e6fffa; border: 1px solid #38b2ac; border-radius: 8px; padding: 20px; margin-top: 20px;">
                <h3 style="color: #2d3748; margin-bottom: 10px;">💡 Prochaines étapes recommandées :</h3>
                <ul style="color: #4a5568; margin-left: 20px;">
                    <li>Examiner la demande dans le back-office</li>
                    <li>Contacter le client dans les 24h</li>
                    <li>Préparer un devis personnalisé</li>
                    <li>Mettre à jour le statut de la demande</li>
                </ul>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">OneClick Services</div>
            <p class="footer-text">
                Back-Office Web Services - Gestion professionnelle de vos devis
            </p>
            <p class="footer-text">
                📧 Email automatique - Ne pas répondre directement<br>
                🔗 <a href="#" class="footer-link">Accéder au tableau de bord</a>
            </p>
            <p style="font-size: 12px; margin-top: 15px; color: #718096;">
                © {{ date('Y') }} OneClick Services. Tous droits réservés.
            </p>
        </div>
    </div>
</body>
</html>