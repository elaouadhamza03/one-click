<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour de votre demande de devis</title>
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
        
        /* Header dynamique selon le statut */
        .header {
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
        }
        
        .header.validated {
            background: linear-gradient(135deg, #48bb78, #38a169);
        }
        
        .header.rejected {
            background: linear-gradient(135deg, #f56565, #e53e3e);
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
        
        .status-icon {
            display: inline-block;
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-bottom: 20px;
            line-height: 80px;
            font-size: 36px;
        }
        
        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 20px 0;
        }
        
        .status-badge.validated {
            background-color: #c6f6d5;
            color: #22543d;
            border: 2px solid #48bb78;
        }
        
        .status-badge.rejected {
            background-color: #fed7d7;
            color: #742a2a;
            border: 2px solid #f56565;
        }
        
        /* Content */
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            color: #2d3748;
            margin-bottom: 25px;
        }
        
        .main-message {
            background: linear-gradient(135deg, #f6f9fc, #e9ecef);
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .main-message h2 {
            color: #2d3748;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .main-message p {
            color: #4a5568;
            font-size: 16px;
            line-height: 1.6;
        }
        
        /* Info Section */
        .info-section {
            margin-bottom: 30px;
        }
        
        .info-section h3 {
            color: #2d3748;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .info-grid {
            background-color: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        
        .info-row {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            flex: 0 0 40%;
            background-color: #f1f3f4;
            padding: 15px 20px;
            font-weight: 600;
            color: #4a5568;
        }
        
        .info-value {
            flex: 1;
            padding: 15px 20px;
            background-color: #ffffff;
            color: #2d3748;
        }
        
        /* Message Box */
        .customer-message {
            background-color: #f7fafc;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }
        
        .customer-message h4 {
            color: #2d3748;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .customer-message p {
            color: #4a5568;
            line-height: 1.6;
            font-style: italic;
        }
        
        /* Next Steps */
        .next-steps {
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }
        
        .next-steps.validated {
            background: linear-gradient(135deg, #f0fff4, #c6f6d5);
            border: 1px solid #48bb78;
        }
        
        .next-steps.rejected {
            background: linear-gradient(135deg, #fffaf0, #feebc8);
            border: 1px solid #ed8936;
        }
        
        .next-steps h3 {
            color: #2d3748;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .next-steps ul {
            color: #4a5568;
            margin-left: 20px;
        }
        
        .next-steps li {
            margin-bottom: 8px;
            line-height: 1.5;
        }
        
        /* Call to Action */
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
        }
        
        .cta-button:hover {
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
            
            .info-row {
                flex-direction: column;
            }
            
            .info-label {
                flex: none;
                border-radius: 4px 4px 0 0;
            }
            
            .info-value {
                border-top: 1px solid #e2e8f0;
                border-radius: 0 0 4px 4px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header {{ $status === 'validé' ? 'validated' : 'rejected' }}">
            <div class="status-icon">
                {{ $status === 'validé' ? '✅' : '❌' }}
            </div>
            <h1>Mise à Jour de Votre Devis</h1>
            <p class="subtitle">
                {{ $status === 'validé' ? 'Excellente nouvelle ! Votre demande a été acceptée' : 'Mise à jour importante concernant votre demande' }}
            </p>
            <div class="status-badge {{ $status === 'validé' ? 'validated' : 'rejected' }}">
                Devis {{ $status }}
            </div>
        </div>
        
        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Bonjour {{ $clientName }},
            </div>
            
            <div class="main-message">
                <h2>
                    @if($status === 'validé')
                        🎉 Félicitations ! Votre demande de devis a été validée
                    @else
                        📋 Votre demande de devis a été examinée
                    @endif
                </h2>
                <p>
                    @if($status === 'validé')
                        Nous sommes ravis de vous informer que votre projet nous intéresse et que nous souhaitons collaborer avec vous. Notre équipe va prendre contact avec vous très prochainement pour finaliser les détails.
                    @else
                        Après examen attentif de votre demande, nous ne sommes malheureusement pas en mesure de donner suite à votre projet dans sa forme actuelle. Cependant, nous restons ouverts à d'autres opportunités de collaboration.
                    @endif
                </p>
            </div>
            
            <div class="info-section">
                <h3>📋 Récapitulatif de votre demande</h3>
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">🔢 Numéro de référence</div>
                        <div class="info-value">#{{ $devisId }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">👤 Nom du client</div>
                        <div class="info-value">{{ $clientName }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">📧 Email de contact</div>
                        <div class="info-value">{{ $clientEmail }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">📅 Date de traitement</div>
                        <div class="info-value">{{ now()->format('d/m/Y à H:i') }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">📊 Statut actuel</div>
                        <div class="info-value">
                            <strong style="color: {{ $status === 'validé' ? '#22543d' : '#742a2a' }};">
                                {{ $status === 'validé' ? '✅ VALIDÉ' : '❌ NON RETENU' }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(is_string($message) && !empty($message))
            <div class="customer-message">
                <h4>💬 Votre demande initiale :</h4>
                <p>"{{ Str::limit($message, 300) }}"</p>
            </div>
            @endif
            
            <div class="next-steps {{ $status === 'validé' ? 'validated' : 'rejected' }}">
                <h3>
                    @if($status === 'validé')
                        🚀 Prochaines étapes
                    @else
                        💡 Nos recommandations
                    @endif
                </h3>
                <ul>
                    @if($status === 'validé')
                        <li><strong>Contact imminent :</strong> Nous vous contacterons dans les 24-48h</li>
                        <li><strong>Devis détaillé :</strong> Vous recevrez une proposition personnalisée</li>
                        <li><strong>Planning :</strong> Nous établirons ensemble un calendrier de réalisation</li>
                        <li><strong>Suivi projet :</strong> Un chef de projet sera assigné à votre dossier</li>
                    @else
                        <li><strong>Feedback constructif :</strong> N'hésitez pas à nous recontacter pour des précisions</li>
                        <li><strong>Nouvelles opportunités :</strong> Nous restons ouverts à de futurs projets</li>
                        <li><strong>Amélioration :</strong> Votre projet pourrait être revu avec des ajustements</li>
                        <li><strong>Alternatives :</strong> Nous pouvons vous orienter vers d'autres solutions</li>
                    @endif
                </ul>
            </div>
            
            @if($status === 'validé')
            <div class="cta-section">
                <a href="#" class="cta-button">
                    📞 Nous contacter directement
                </a>
            </div>
            @endif
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">OneClick Services</div>
            <p class="footer-text">
                Votre partenaire de confiance pour tous vos projets web
            </p>
            <p class="footer-text">
                📧 {{ $status === 'validé' ? 'Des questions ? Répondez à cet email' : 'Cet email est automatique - Ne pas répondre' }}<br>
                🌐 <a href="#" class="footer-link">www.oneclick-services.com</a> | 
                📞 <a href="#" class="footer-link">01 23 45 67 89</a>
            </p>
            <p style="font-size: 12px; margin-top: 15px; color: #718096;">
                © {{ date('Y') }} OneClick Services. Tous droits réservés.<br>
                Merci de votre confiance ! 🙏
            </p>
        </div>
    </div>
</body>
</html>