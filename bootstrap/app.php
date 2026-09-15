<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Envoi dépassant post_max_size : PHP vide la requête (jeton CSRF compris).
        // Sans ce traitement, l'utilisateur tombe sur une page 419 illisible.
        $exceptions->render(function (PostTooLargeException $e, $request) {
            return back()->withInput()->with(
                'error',
                'Le fichier envoyé est trop volumineux. Choisissez une image de moins de 4 Mo.'
            );
        });
    })->create();
