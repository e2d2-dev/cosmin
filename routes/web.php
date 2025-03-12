<?php

use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Panel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

foreach (Panel::get()->getPages() as $class) {

    Route::get($class::getRoute(), $class)
        ->middleware(['auth'])
        ->name($class::getRouteName());
}

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
});



require __DIR__.'/auth.php';
