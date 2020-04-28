<?php

use Illuminate\Foundation\Inspiring;
use App\Models\Message;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('laracarte:clean-database', function () {
    $this->info('cleaning database...');
        Message::oneDayOld()->delete();
    $this->info('database cleaned.');
})->describe('Clean database after one month');
