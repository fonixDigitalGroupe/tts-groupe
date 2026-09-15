<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/bureau-etudes', [AboutController::class, 'bureauEtudes'])->name('bureau-etudes');
Route::get('/production-terrain', [AboutController::class, 'productionTerrain'])->name('production-terrain');
Route::get('/raccordement', [AboutController::class, 'raccordement'])->name('raccordement');
Route::get('/sav', [AboutController::class, 'sav'])->name('sav');
Route::get('/deploiement', [AboutController::class, 'deploiement'])->name('deploiement');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// ─── Admin Panel ──────────────────────────────────────────────
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    // Public Auth Routes
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.post');

    // Protected Routes
    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');

        // Statistiques (contenu page d'accueil)
        Route::get('/statistiques', [AdminController::class, 'statistics'])->name('statistics');
        Route::put('/statistiques', [AdminController::class, 'statisticsUpdate'])->name('statistics.update');

        // Services (section page d'accueil)
        Route::get('/services', [AdminController::class, 'servicesIndex'])->name('services.index');
        Route::put('/services/section', [AdminController::class, 'servicesSectionUpdate'])->name('services.section.update');
        Route::get('/services/create', [AdminController::class, 'servicesCreate'])->name('services.create');
        Route::post('/services', [AdminController::class, 'servicesStore'])->name('services.store');
        Route::get('/services/{service}/edit', [AdminController::class, 'servicesEdit'])->name('services.edit');
        Route::put('/services/{service}', [AdminController::class, 'servicesUpdate'])->name('services.update');
        Route::delete('/services/{service}', [AdminController::class, 'servicesDestroy'])->name('services.destroy');

        // Équipes (section « Nos équipes en action »)
        Route::get('/equipes', [AdminController::class, 'teamsIndex'])->name('teams.index');
        Route::put('/equipes/section', [AdminController::class, 'teamsSectionUpdate'])->name('teams.section.update');
        Route::post('/equipes', [AdminController::class, 'teamsStore'])->name('teams.store');
        Route::get('/equipes/{team}/edit', [AdminController::class, 'teamsEdit'])->name('teams.edit');
        Route::put('/equipes/{team}', [AdminController::class, 'teamsUpdate'])->name('teams.update');
        Route::delete('/equipes/{team}', [AdminController::class, 'teamsDestroy'])->name('teams.destroy');

        // Partenaires (section « Références clients »)
        Route::get('/partenaires', [AdminController::class, 'partnersIndex'])->name('partners.index');
        Route::put('/partenaires/section', [AdminController::class, 'partnersSectionUpdate'])->name('partners.section.update');
        Route::post('/partenaires', [AdminController::class, 'partnersStore'])->name('partners.store');
        Route::get('/partenaires/{partner}/edit', [AdminController::class, 'partnersEdit'])->name('partners.edit');
        Route::put('/partenaires/{partner}', [AdminController::class, 'partnersUpdate'])->name('partners.update');
        Route::delete('/partenaires/{partner}', [AdminController::class, 'partnersDestroy'])->name('partners.destroy');

        // Contact (section page d'accueil)
        Route::get('/contact', [AdminController::class, 'contact'])->name('contact');
        Route::put('/contact', [AdminController::class, 'contactUpdate'])->name('contact.update');

        // Bannière (accueil)
        Route::get('/banniere', [AdminController::class, 'banner'])->name('banner');
        Route::put('/banniere', [AdminController::class, 'bannerUpdate'])->name('banner.update');

        // Page À propos
        Route::get('/a-propos', [AdminController::class, 'about'])->name('about');
        Route::put('/a-propos', [AdminController::class, 'aboutUpdate'])->name('about.update');

        // Settings & Users
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
        Route::post('/users', [AdminController::class, 'usersStore'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'usersEdit'])->name('users.edit');
        Route::put('/users/{user}', [AdminController::class, 'usersUpdate'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'usersDestroy'])->name('users.destroy');
    });
});
