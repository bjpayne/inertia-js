<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    $data = [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ];

    return Inertia::render('Welcome', $data);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'agentId'   => 1,
            'agentName' => 'Ben Payne',
        ];

        return Inertia::render('Dashboard', $data);
    })->name('dashboard');

    Route::get('/recordings', function () {
        $recordings = \App\Models\Recordings::all()
            ->values()
            ->toArray();

        return Inertia::render('Recordings', compact('recordings'));
    })->name('recordings');
});
