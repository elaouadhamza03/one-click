<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Configuration de la commande hebdomadaire
Schedule::command('report:weekly')
    ->weekly()
    ->mondays()
    ->at('08:00')
    ->timezone('Europe/Paris')
    ->appendOutputTo(storage_path('logs/weekly-report.log'));
