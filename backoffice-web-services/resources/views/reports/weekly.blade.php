<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport Hebdomadaire des Devis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .period {
            color: #666;
            margin-bottom: 20px;
        }
        .stats {
            margin: 20px 0;
        }
        .stat-item {
            margin: 10px 0;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Rapport Hebdomadaire des Devis</h1>
    </div>

    <div class="period">
        <h2>Période : {{ $start_date }} au {{ $end_date }}</h2>
    </div>

    <div class="stats">
        <div class="stat-item">
            <strong>Total des devis :</strong> {{ $total_devis }}
        </div>
        <div class="stat-item">
            <strong>Devis validés :</strong> {{ $validated_devis }}
        </div>
        <div class="stat-item">
            <strong>Devis refusés :</strong> {{ $rejected_devis }}
        </div>
    </div>

    <div class="footer">
        <p>Rapport généré automatiquement le {{ now()->format('d/m/Y H:i') }}</p>
        <p>Back Office Web Services</p>
    </div>
</body>
</html> 