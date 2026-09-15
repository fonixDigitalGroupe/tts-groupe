<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Quand un envoi dépasse post_max_size, PHP vide $_POST et $_FILES sans rien
 * signaler. Le champ _method disparaît avec le reste : une modification part
 * alors en POST au lieu de PUT et Laravel répond « 405 Method Not Allowed »,
 * message incompréhensible pour l'utilisateur.
 *
 * Ce middleware est global : il s'exécute avant le routage, donc avant que le
 * 405 ne soit levé. La session n'étant pas encore démarrée à ce stade, on
 * renvoie une réponse autonome plutôt qu'une redirection avec message flash.
 */
class DetecteEnvoiTronque
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->corpsPerdu($request)) {
            $limite = ini_get('post_max_size') ?: 'la limite du serveur';
            $retour = $request->headers->get('referer', url('/'));

            return response()->view('errors.envoi-tronque', [
                'limite' => $limite,
                'retour' => $retour,
            ], 413);
        }

        return $next($request);
    }

    /**
     * Requête POST annoncée avec un corps, mais que PHP a livrée vide.
     */
    private function corpsPerdu(Request $request): bool
    {
        // Restreint aux envois de formulaire : un corps JSON est vide côté
        // $request->post() sans que rien ne soit perdu.
        $type = (string) $request->headers->get('CONTENT_TYPE');
        $formulaire = str_contains($type, 'multipart/form-data')
            || str_contains($type, 'application/x-www-form-urlencoded');

        return $formulaire
            && $request->isMethod('POST')
            && (int) $request->server('CONTENT_LENGTH') > 0
            && empty($request->post())
            && empty($request->allFiles());
    }
}
