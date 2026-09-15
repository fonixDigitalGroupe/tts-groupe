<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Plan du site, bâti sur l'adresse canonique (APP_URL) et non sur l'hôte
     * de la visite : un sitemap doit toujours annoncer les URL de référence.
     */
    public function index(): Response
    {
        $racine = rtrim(config('app.url'), '/');

        $pages = [
            ['chemin' => '',       'frequence' => 'weekly',  'priorite' => '1.0'],
            ['chemin' => '/about', 'frequence' => 'monthly', 'priorite' => '0.8'],
        ];

        foreach (Service::active()->ordered()->get() as $service) {
            $pages[] = [
                'chemin'    => '/services/' . $service->slug,
                'frequence' => 'monthly',
                'priorite'  => '0.7',
                'modifie'   => $service->updated_at,
            ];
        }

        return response()
            ->view('sitemap', ['racine' => $racine, 'pages' => $pages])
            ->header('Content-Type', 'application/xml');
    }
}
