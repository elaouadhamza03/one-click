<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mise à jour de votre demande de devis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .status {
            font-weight: bold;
            color: {{ $status === 'validé' ? '#28a745' : '#dc3545' }};
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Mise à jour de votre demande de devis</h1>
    </div>

    <div class="content">
        <p>Bonjour {{ $clientName }},</p>

        <p>Nous avons le plaisir de vous informer que votre demande de devis a été <span class="status">{{ $status }}</span>.</p>

        <p>Détails de votre demande :</p>
        <ul>
            <li>Numéro de devis : #{{ $devisId }}</li>
            <li>Message : {{ is_string($message) ? Str::limit($message, 200) : '' }}</li>
        </ul>

        @if($status === 'validé')
            <p>Nous vous contacterons dans les plus brefs délais pour finaliser votre projet.</p>
        @else
            <p>Si vous avez des questions ou souhaitez plus d'informations, n'hésitez pas à nous contacter.</p>
        @endif
    </div>

    <div class="footer">
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
        <p>Back Office Web Services</p>
    </div>
</body>
</html> 