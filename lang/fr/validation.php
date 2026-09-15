<?php

/*
 * Messages de validation en français.
 * Seules les règles utilisées par l'administration sont traduites ; pour les
 * autres, Laravel retombe sur APP_FALLBACK_LOCALE.
 */

return [
    'accepted'  => 'Le champ :attribute doit être accepté.',
    'array'     => 'Le champ :attribute doit être un tableau.',
    'boolean'   => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
    'email'     => 'Le champ :attribute doit être une adresse e-mail valide.',
    'exists'    => 'La valeur sélectionnée pour :attribute est invalide.',
    'image'     => 'Le fichier :attribute doit être une image (JPG, PNG, GIF ou WEBP).',
    'in'        => 'La valeur sélectionnée pour :attribute est invalide.',
    'integer'   => 'Le champ :attribute doit être un nombre entier.',
    'mimes'     => 'Le fichier :attribute doit être de type : :values.',
    'numeric'   => 'Le champ :attribute doit être un nombre.',
    'required'  => 'Le champ :attribute est obligatoire.',
    'string'    => 'Le champ :attribute doit être une chaîne de caractères.',
    'unique'    => 'Cette valeur de :attribute est déjà utilisée.',
    'uploaded'  => "L'envoi du fichier :attribute a échoué. Il est probablement trop volumineux.",
    'url'       => 'Le champ :attribute doit être une URL valide.',

    'max' => [
        'array'   => 'Le champ :attribute ne doit pas contenir plus de :max éléments.',
        'file'    => 'Le fichier :attribute ne doit pas dépasser :max Ko.',
        'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
        'string'  => 'Le champ :attribute ne doit pas dépasser :max caractères.',
    ],

    'min' => [
        'array'   => 'Le champ :attribute doit contenir au moins :min éléments.',
        'file'    => 'Le fichier :attribute doit peser au moins :min Ko.',
        'numeric' => 'Le champ :attribute doit être au moins :min.',
        'string'  => 'Le champ :attribute doit contenir au moins :min caractères.',
    ],

    // Noms lisibles, repris tels quels dans les messages ci-dessus.
    'attributes' => [
        'image'              => 'image',
        'caption'            => 'légende',
        'title'              => 'titre',
        'description'        => 'description',
        'name'               => 'nom',
        'email'              => 'adresse e-mail',
        'password'           => 'mot de passe',
        'icon'               => 'icône',
        'link'               => 'lien',
        'page_image'         => 'image de la page',
        'page_subtitle'      => 'sous-titre de la page',
        'page_content'       => 'contenu de la page',
        'banner_image'       => 'image de la bannière',
        'contact_image'      => 'image de la section contact',
        'about_hero_image'   => "image d'en-tête",
        'about_banner_image' => 'image de la bannière',
        'gallery_files.*'    => 'image de la galerie',
    ],
];
