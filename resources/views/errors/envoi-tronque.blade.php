<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichier trop volumineux</title>
    <style>
        body { margin:0; min-height:100vh; display:flex; align-items:center; justify-content:center;
               background:#f1f5f9; font-family:system-ui,-apple-system,"Segoe UI",sans-serif; color:#0f172a; }
        .carte { max-width:32rem; margin:1rem; background:#fff; border:1px solid #e2e8f0; border-radius:12px;
                 padding:2rem; box-shadow:0 1px 3px rgba(0,0,0,.08); }
        h1 { font-size:1.25rem; margin:0 0 .75rem; }
        p { color:#475569; line-height:1.6; margin:0 0 1rem; font-size:.95rem; }
        a { display:inline-block; background:#00A3A2; color:#fff; text-decoration:none;
            padding:.625rem 1.5rem; border-radius:4px; font-weight:600; font-size:.875rem; }
    </style>
</head>
<body>
    <div class="carte">
        <h1>Fichier trop volumineux</h1>
        <p>
            Le fichier envoyé dépasse la taille maximale acceptée par le serveur
            ({{ $limite }}). L'envoi a été interrompu et <strong>rien n'a été enregistré</strong>.
        </p>
        <p>
            Réduisez le poids de l'image avant de réessayer : une photo de moins de
            12 Mo convient parfaitement pour le site.
        </p>
        <a href="{{ $retour }}">Retour</a>
    </div>
</body>
</html>
