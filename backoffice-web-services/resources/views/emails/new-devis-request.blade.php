<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle demande de devis</title>
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
        <h1>Nouvelle demande de devis</h1>
    </div>

    <div class="content">
        <p>Une nouvelle demande de devis a été créée :</p>

        <p><strong>Client :</strong> {{ $clientName }}</p>
        <p><strong>Email :</strong> {{ $clientEmail }}</p>
        <p><strong>Numéro de devis :</strong> #{{ $quoteId }}</p>
        <p><strong>Message :</strong></p>
        <p>{{ is_string($message) ? Str::limit($message, 200) : '' }}</p>

        <p>Vous pouvez consulter et gérer cette demande dans le back-office.</p>
    </div>

    <div class="footer">
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
        <p>Back Office Web Services</p>
    </div>
</body>
</html> 