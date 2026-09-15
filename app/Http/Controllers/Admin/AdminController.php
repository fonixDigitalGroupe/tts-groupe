<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamItem;
use App\Support\AboutIcons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ───── DASHBOARD ─────
    public function dashboard()
    {
        return redirect()->route('admin.settings');
    }

    // ───── SETTINGS & USERS ─────
    public function settings()
    {
        $users = \App\Models\User::latest()->get();
        return view('admin.settings', compact('users'));
    }

    // ───── STATISTIQUES (contenu page d'accueil) ─────
    public function statistics()
    {
        $stats = [
            'badge'       => Setting::get('stats_badge', 'Depuis 2017'),
            'title'       => Setting::get('stats_title', "L'expertise technique au service de vos réseaux"),
            'description' => Setting::get('stats_description', "Spécialiste des travaux Télécom et Fibre Optique, TTS GROUPE conjugue Bureau d'Études et Production Terrain pour accompagner ses clients sur toute la chaîne de valeur."),
            'num1'        => Setting::get('stats_num1', '12'),
            'label1'      => Setting::get('stats_label1', 'Techniciens qualifiés'),
            'num2'        => Setting::get('stats_num2', '7'),
            'label2'      => Setting::get('stats_label2', 'Clients référencés'),
            'num3'        => Setting::get('stats_num3', '4'),
            'label3'      => Setting::get('stats_label3', "Domaines d'expertise"),
        ];
        return view('admin.statistics', compact('stats'));
    }

    public function statisticsUpdate(Request $request)
    {
        $request->validate([
            'stats_badge'       => 'nullable|string|max:100',
            'stats_title'       => 'nullable|string|max:255',
            'stats_description' => 'nullable|string|max:1000',
            'stats_num1'        => 'nullable|string|max:20',
            'stats_label1'      => 'nullable|string|max:100',
            'stats_num2'        => 'nullable|string|max:20',
            'stats_label2'      => 'nullable|string|max:100',
            'stats_num3'        => 'nullable|string|max:20',
            'stats_label3'      => 'nullable|string|max:100',
        ]);

        $keys = [
            'stats_badge', 'stats_title', 'stats_description',
            'stats_num1', 'stats_label1',
            'stats_num2', 'stats_label2',
            'stats_num3', 'stats_label3',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        return back()->with('success', 'Statistiques mises à jour avec succès.');
    }

    // ───── SERVICES (section page d'accueil) ─────
    public function servicesIndex()
    {
        $services = Service::ordered()->get();
        $icons = Service::ICONS;
        $section = [
            'title'    => Setting::get('services_title', 'Nos services'),
            'subtitle' => Setting::get('services_subtitle', 'Des solutions techniques de pointe pour vos infrastructures télécom.'),
        ];
        return view('admin.services', compact('services', 'section', 'icons'));
    }

    public function servicesSectionUpdate(Request $request)
    {
        $request->validate([
            'services_title'    => 'nullable|string|max:255',
            'services_subtitle' => 'nullable|string|max:500',
        ]);

        Setting::set('services_title', $request->input('services_title'));
        Setting::set('services_subtitle', $request->input('services_subtitle'));

        return back()->with('success', 'En-tête de la section mis à jour.');
    }

    public function servicesCreate()
    {
        $icons = Service::ICONS;
        return view('admin.services.create', compact('icons'));
    }

    public function servicesStore(Request $request)
    {
        $data = $request->validate([
            'icon'            => 'required|string|in:' . implode(',', array_keys(Service::ICONS)),
            'title'           => 'required|string|max:255',
            'description'     => 'nullable|string|max:500',
            'page_subtitle'   => 'nullable|string|max:255',
            'page_image'      => 'nullable|image|max:12288',
            'cards'           => 'nullable|array',
            'cards.*.title'   => 'nullable|string|max:255',
            'cards.*.items'   => 'nullable|array',
            'cards.*.items.*' => 'nullable|string|max:255',
        ]);

        $data['slug']       = Service::makeSlug($data['title']);
        $data['sort_order'] = (int) (Service::max('sort_order') + 1);
        $data['is_active']  = true;

        // Nettoyage des cartes.
        $data['cards'] = collect($request->input('cards', []))
            ->map(fn ($card) => [
                'title' => trim($card['title'] ?? ''),
                'items' => array_values(array_filter(
                    array_map('trim', $card['items'] ?? []),
                    fn ($item) => $item !== ''
                )),
            ])
            ->filter(fn ($card) => $card['title'] !== '' || count($card['items']) > 0)
            ->values()
            ->all();

        // Image de la page.
        unset($data['page_image']);
        if ($request->hasFile('page_image')) {
            $data['page_image'] = $request->file('page_image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service ajouté avec succès.');
    }

    public function servicesEdit(Service $service)
    {
        $icons = Service::ICONS;
        return view('admin.services.edit', compact('service', 'icons'));
    }

    public function servicesUpdate(Request $request, Service $service)
    {
        $data = $request->validate([
            'icon'            => 'required|string|in:' . implode(',', array_keys(Service::ICONS)),
            'title'           => 'required|string|max:255',
            'description'     => 'nullable|string|max:500',
            'page_subtitle'   => 'nullable|string|max:255',
            'page_image'      => 'nullable|image|max:12288',
            'remove_image'    => 'nullable|boolean',
            'cards'           => 'nullable|array',
            'cards.*.title'   => 'nullable|string|max:255',
            'cards.*.items'   => 'nullable|array',
            'cards.*.items.*' => 'nullable|string|max:255',
        ]);

        // Slug stable (on ne le régénère que s'il est absent, pour ne pas casser les liens).
        if (empty($service->slug)) {
            $data['slug'] = Service::makeSlug($data['title'], $service->id);
        }

        // Nettoyage des cartes : on retire les rubriques et cartes vides.
        $data['cards'] = collect($request->input('cards', []))
            ->map(fn ($card) => [
                'title' => trim($card['title'] ?? ''),
                'items' => array_values(array_filter(
                    array_map('trim', $card['items'] ?? []),
                    fn ($item) => $item !== ''
                )),
            ])
            ->filter(fn ($card) => $card['title'] !== '' || count($card['items']) > 0)
            ->values()
            ->all();

        // Gestion de l'image de la page.
        unset($data['page_image'], $data['remove_image']);

        if ($request->boolean('remove_image') && $service->page_image) {
            Storage::disk('public')->delete($service->page_image);
            $data['page_image'] = null;
        }
        if ($request->hasFile('page_image')) {
            if ($service->page_image) {
                Storage::disk('public')->delete($service->page_image);
            }
            $data['page_image'] = $request->file('page_image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service modifié.');
    }

    public function servicesDestroy(Service $service)
    {
        if ($service->page_image) {
            Storage::disk('public')->delete($service->page_image);
        }
        $service->delete();
        return back()->with('success', 'Service supprimé.');
    }

    // ───── ÉQUIPES (section « Nos équipes en action ») ─────
    public function teamsIndex()
    {
        $items = TeamItem::ordered()->get();
        $section = [
            'title'    => Setting::get('teams_title', 'Nos équipes en action'),
            'subtitle' => Setting::get('teams_subtitle', "Découvrez notre expertise sur le terrain et en bureau d'études à travers les interventions de nos équipes qualifiées."),
        ];
        return view('admin.teams', compact('items', 'section'));
    }

    public function teamsSectionUpdate(Request $request)
    {
        $request->validate([
            'teams_title'    => 'nullable|string|max:255',
            'teams_subtitle' => 'nullable|string|max:500',
        ]);

        Setting::set('teams_title', $request->input('teams_title'));
        Setting::set('teams_subtitle', $request->input('teams_subtitle'));

        return back()->with('success', 'En-tête de la section mis à jour.');
    }

    public function teamsStore(Request $request)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image'   => 'required|image|max:12288',
        ]);

        TeamItem::create([
            'caption'    => $request->caption,
            'image'      => $request->file('image')->store('teams', 'public'),
            'sort_order' => (int) (TeamItem::max('sort_order') + 1),
            'is_active'  => true,
        ]);

        return redirect()->route('admin.teams.index')->with('success', 'Image ajoutée avec succès.');
    }

    public function teamsEdit(TeamItem $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function teamsUpdate(Request $request, TeamItem $team)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image'   => 'nullable|image|max:12288',
        ]);

        $data = ['caption' => $request->caption];

        if ($request->hasFile('image')) {
            if ($team->image && str_starts_with($team->image, 'teams/')) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Image modifiée.');
    }

    public function teamsDestroy(TeamItem $team)
    {
        if ($team->image && str_starts_with($team->image, 'teams/')) {
            Storage::disk('public')->delete($team->image);
        }
        $team->delete();
        return back()->with('success', 'Image supprimée.');
    }

    // ───── PARTENAIRES (section « Références clients ») ─────
    public function partnersIndex()
    {
        $items = Partner::ordered()->get();
        $section = [
            'title'    => Setting::get('partners_title', 'Références clients'),
            'subtitle' => Setting::get('partners_subtitle', 'Ils nous font confiance pour leurs projets télécom'),
        ];
        return view('admin.partners', compact('items', 'section'));
    }

    public function partnersSectionUpdate(Request $request)
    {
        $request->validate([
            'partners_title'    => 'nullable|string|max:255',
            'partners_subtitle' => 'nullable|string|max:500',
        ]);

        Setting::set('partners_title', $request->input('partners_title'));
        Setting::set('partners_subtitle', $request->input('partners_subtitle'));

        return back()->with('success', 'En-tête de la section mis à jour.');
    }

    public function partnersStore(Request $request)
    {
        $request->validate([
            'name'  => 'nullable|string|max:255',
            'image' => 'required|image|max:12288',
        ]);

        Partner::create([
            'name'       => $request->name,
            'image'      => $request->file('image')->store('partners', 'public'),
            'sort_order' => (int) (Partner::max('sort_order') + 1),
            'is_active'  => true,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Logo ajouté avec succès.');
    }

    public function partnersEdit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function partnersUpdate(Request $request, Partner $partner)
    {
        $request->validate([
            'name'  => 'nullable|string|max:255',
            'image' => 'nullable|image|max:12288',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('image')) {
            if ($partner->image && str_starts_with($partner->image, 'partners/')) {
                Storage::disk('public')->delete($partner->image);
            }
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Logo modifié.');
    }

    public function partnersDestroy(Partner $partner)
    {
        if ($partner->image && str_starts_with($partner->image, 'partners/')) {
            Storage::disk('public')->delete($partner->image);
        }
        $partner->delete();
        return back()->with('success', 'Logo supprimé.');
    }

    // ───── CONTACT (section page d'accueil) ─────
    public function contact()
    {
        $contact = [
            'title'    => Setting::get('contact_title', 'Prêt à donner vie à votre prochain projet ?'),
            'subtitle' => Setting::get('contact_subtitle', "Échangeons sur vos besoins pour construire ensemble une solution sur mesure qui fera grandir votre entreprise. Contactez-nous dès aujourd'hui."),
            'image'    => Setting::get('contact_image'),
        ];
        return view('admin.contact', compact('contact'));
    }

    public function contactUpdate(Request $request)
    {
        $request->validate([
            'contact_title'    => 'nullable|string|max:255',
            'contact_subtitle' => 'nullable|string|max:1000',
            'contact_image'    => 'nullable|image|max:12288',
        ]);

        Setting::set('contact_title', $request->input('contact_title'));
        Setting::set('contact_subtitle', $request->input('contact_subtitle'));

        if ($request->hasFile('contact_image')) {
            $old = Setting::get('contact_image');
            if ($old && str_starts_with($old, 'contact/')) {
                Storage::disk('public')->delete($old);
            }
            Setting::set('contact_image', $request->file('contact_image')->store('contact', 'public'));
        }

        return back()->with('success', 'Section contact mise à jour.');
    }

    // ───── BANNIÈRE (accueil) ─────
    public function banner()
    {
        $banner = [
            'title'     => Setting::get('banner_title', 'Travaux télécom –'),
            'highlight' => Setting::get('banner_highlight', 'Fibre optique'),
            'tagline'   => Setting::get('banner_tagline', 'Le goût du travail de qualité'),
            'text'      => Setting::get('banner_text', "L'expert de référence pour l'ingénierie, le déploiement et la maintenance de vos infrastructures télécom & fibre optique."),
            'btn1'      => Setting::get('banner_btn1', 'Découvrir nos services'),
            'btn2'      => Setting::get('banner_btn2', 'En savoir plus'),
            'image'     => Setting::get('banner_image'),
        ];
        return view('admin.banner', compact('banner'));
    }

    public function bannerUpdate(Request $request)
    {
        $request->validate([
            'banner_title'     => 'nullable|string|max:255',
            'banner_highlight' => 'nullable|string|max:255',
            'banner_tagline'   => 'nullable|string|max:255',
            'banner_text'      => 'nullable|string|max:1000',
            'banner_btn1'      => 'nullable|string|max:100',
            'banner_btn2'      => 'nullable|string|max:100',
            'banner_image'     => 'nullable|image|max:12288',
        ]);

        foreach (['banner_title', 'banner_highlight', 'banner_tagline', 'banner_text', 'banner_btn1', 'banner_btn2'] as $key) {
            Setting::set($key, $request->input($key));
        }

        if ($request->hasFile('banner_image')) {
            $old = Setting::get('banner_image');
            if ($old && str_starts_with($old, 'banner/')) {
                Storage::disk('public')->delete($old);
            }
            Setting::set('banner_image', $request->file('banner_image')->store('banner', 'public'));
        }

        return back()->with('success', 'Bannière mise à jour.');
    }

    // ───── PAGE À PROPOS ─────
    public function about()
    {
        $about = [
            'hero_title'            => Setting::get('about_hero_title', 'Qui sommes-nous ?'),
            'hero_subtitle'         => Setting::get('about_hero_subtitle', 'Votre Partenaire Télécom de Confiance'),
            'hero_text'             => Setting::get('about_hero_text', "TTS GROUPE est une entreprise spécialisée dans les travaux Télécom et Fibre Optique, intervenant sur les marchés européens et africains. Notre double expertise – Bureau d'Études et Production Terrain – nous permet d'accompagner nos clients sur l'ensemble de la chaîne de valeur des réseaux télécom."),
            'hero_image'            => Setting::get('about_hero_image'),
            'gallery_title'         => Setting::get('about_gallery_title', "Notre Terrain d'Action"),
            'gallery_subtitle'      => Setting::get('about_gallery_subtitle', "Découvrez nos équipes au cœur de l'action sur le terrain."),
            'moyens_title'          => Setting::get('about_moyens_title', 'Moyens Humains & Matériels'),
            'banner_title'          => Setting::get('about_banner_title', 'Matériel Professionnel'),
            'banner_text'           => Setting::get('about_banner_text', 'Soudeuses Sumitomo, réflectomètres, outillage spécialisé de dernière génération pour des interventions précises et durables.'),
            'banner_image'          => Setting::get('about_banner_image'),
            'engagements_title'     => Setting::get('about_engagements_title', 'Sécurité – Qualité – Planning'),
            'engagements_subtitle'  => Setting::get('about_engagements_subtitle', "La sécurité et la communication sont les piliers de notre méthodologie sur l'ensemble de nos chantiers."),
            'expertise'             => $this->aboutJson('about_expertise', $this->defaultExpertise()),
            'gallery'               => $this->aboutJson('about_gallery', $this->defaultGallery()),
            'moyens'                => $this->aboutJson('about_moyens', $this->defaultMoyens()),
            'engagements'           => $this->aboutJson('about_engagements', $this->defaultEngagements()),
        ];
        $icons = AboutIcons::MAP;
        return view('admin.about', compact('about', 'icons'));
    }

    public function aboutUpdate(Request $request)
    {
        $request->validate([
            'about_hero_image'   => 'nullable|image|max:12288',
            'about_banner_image' => 'nullable|image|max:12288',
            'gallery_files.*'    => 'nullable|image|max:12288',
        ]);

        // Textes simples
        $textKeys = [
            'about_hero_title', 'about_hero_subtitle', 'about_hero_text',
            'about_gallery_title', 'about_gallery_subtitle', 'about_moyens_title',
            'about_banner_title', 'about_banner_text',
            'about_engagements_title', 'about_engagements_subtitle',
        ];
        foreach ($textKeys as $key) {
            Setting::set($key, $request->input($key));
        }

        // Images hero & bannière
        foreach (['about_hero_image', 'about_banner_image'] as $field) {
            if ($request->hasFile($field)) {
                $old = Setting::get($field);
                if ($old && str_starts_with($old, 'about/')) {
                    Storage::disk('public')->delete($old);
                }
                Setting::set($field, $request->file($field)->store('about', 'public'));
            }
        }

        // Cartes d'expertise (titre + desc + items)
        $expertise = collect($request->input('expertise', []))->map(fn ($c) => [
            'icon'  => in_array($c['icon'] ?? '', array_keys(AboutIcons::MAP)) ? $c['icon'] : 'building',
            'title' => trim($c['title'] ?? ''),
            'desc'  => trim($c['desc'] ?? ''),
            'items' => collect($c['items'] ?? [])->map(fn ($it) => [
                'title' => trim($it['title'] ?? ''),
                'desc'  => trim($it['desc'] ?? ''),
            ])->filter(fn ($it) => $it['title'] !== '' || $it['desc'] !== '')->values()->all(),
        ])->filter(fn ($c) => $c['title'] !== '' || $c['desc'] !== '' || count($c['items']) > 0)->values()->all();
        Setting::set('about_expertise', json_encode($expertise));

        // Moyens
        $moyens = collect($request->input('moyens', []))->map(fn ($m) => [
            'icon'  => in_array($m['icon'] ?? '', array_keys(AboutIcons::MAP)) ? $m['icon'] : 'users',
            'label' => trim($m['label'] ?? ''),
            'desc'  => trim($m['desc'] ?? ''),
        ])->filter(fn ($m) => $m['label'] !== '' || $m['desc'] !== '')->values()->all();
        Setting::set('about_moyens', json_encode($moyens));

        // Engagements
        $engagements = collect($request->input('engagements', []))->map(fn ($e) => [
            'icon'  => in_array($e['icon'] ?? '', array_keys(AboutIcons::MAP)) ? $e['icon'] : 'shield',
            'title' => trim($e['title'] ?? ''),
            'desc'  => trim($e['desc'] ?? ''),
        ])->filter(fn ($e) => $e['title'] !== '' || $e['desc'] !== '')->values()->all();
        Setting::set('about_engagements', json_encode($engagements));

        // Galerie (image + description, upload par élément)
        $galleryInput = $request->input('about_gallery', []);
        $galleryFiles = $request->file('gallery_files', []);
        $gallery = [];
        foreach ($galleryInput as $i => $g) {
            $image = $g['image'] ?? null;
            if (isset($galleryFiles[$i]) && $galleryFiles[$i]) {
                if ($image && str_starts_with($image, 'about/')) {
                    Storage::disk('public')->delete($image);
                }
                $image = $galleryFiles[$i]->store('about', 'public');
            }
            $desc = trim($g['desc'] ?? '');
            if ($image || $desc !== '') {
                $gallery[] = ['image' => $image, 'desc' => $desc];
            }
        }
        Setting::set('about_gallery', json_encode($gallery));

        return back()->with('success', 'Page À propos mise à jour.');
    }

    private function aboutJson(string $key, array $default): array
    {
        $raw = Setting::get($key);
        if (! $raw) {
            return $default;
        }
        $decoded = json_decode($raw, true);
        return is_array($decoded) ? $decoded : $default;
    }

    private function defaultExpertise(): array
    {
        return [
            [
                'icon'  => 'building',
                'title' => "Bureau d'Études & Innovation",
                'desc'  => 'Conception et ingénierie de précision pour vos futurs réseaux.',
                'items' => [
                    ['title' => 'Études Réseaux FTTA / FTTH / FTTO', 'desc' => 'Conception et dimensionnement de réseaux fibre optique pour les opérateurs et collectivités.'],
                    ['title' => 'SIG & Cartographie', 'desc' => 'Maîtrise des bases de données géospatiales et analyse territoriale : urbanisme, agriculture.'],
                    ['title' => 'Développement Logiciel', 'desc' => 'Solutions innovantes pour optimiser la gestion et le déploiement des infrastructures.'],
                ],
            ],
            [
                'icon'  => 'broadcast',
                'title' => 'Production Terrain',
                'desc'  => 'Interventions techniques spécialisées directement sur site.',
                'items' => [
                    ['title' => 'Raccordement Abonné FTTH', 'desc' => 'Du boîtier au logement : tirage de câble, soudure, mesures optiques, mise en service.'],
                    ['title' => 'SAV & Diagnostic', 'desc' => 'Intervention rapide, recherche de pannes, reprises de soudures et remise en conformité.'],
                    ['title' => 'Maintenance & Déploiement', 'desc' => 'Maintenance préventive et corrective sur infrastructures aériennes et souterraines.'],
                ],
            ],
        ];
    }

    private function defaultGallery(): array
    {
        return [
            ['image' => 'images/equipe_1.png', 'desc' => 'Équipe terrain - Densification K46'],
            ['image' => 'images/equipe_2.png', 'desc' => 'Intervention aérienne - Traverse Senelec'],
            ['image' => 'images/equipe_3.png', 'desc' => 'Préparation chantier - Logistique terrain'],
            ['image' => 'images/equipe_4.png', 'desc' => 'Soudeuse fibre optique Sumitomo TYPE-71C'],
            ['image' => 'images/equipe_3.png', 'desc' => 'Présence sur site N00'],
        ];
    }

    private function defaultMoyens(): array
    {
        return [
            ['icon' => 'users', 'label' => 'Effectifs', 'desc' => '12 salariés qualifiés terrain'],
            ['icon' => 'cog', 'label' => 'Équipes', 'desc' => 'Équipes dédiées : production, SAV, maintenance, déploiement'],
            ['icon' => 'truck', 'label' => 'Véhicules', 'desc' => '2 pick-up'],
            ['icon' => 'truck', 'label' => 'Utilitaires', 'desc' => '5 à 6 véhicules utilitaires'],
            ['icon' => 'shield', 'label' => 'Sécurité', 'desc' => 'Équipements complets de sécurité (EPI)'],
            ['icon' => 'wrench', 'label' => 'Matériel', 'desc' => 'Matériel professionnel fibre optique (soudeuses, réflectomètres, outillage spécialisé)'],
        ];
    }

    private function defaultEngagements(): array
    {
        return [
            ['icon' => 'shield', 'title' => 'Sécurité', 'desc' => 'Port systématique des EPI et respect HSE.'],
            ['icon' => 'check-circle', 'title' => 'Qualité', 'desc' => 'Engagement total sur la durabilité.'],
            ['icon' => 'clock', 'title' => 'Planning', 'desc' => 'Respect strict des délais impartis.'],
            ['icon' => 'chat', 'title' => 'Communication', 'desc' => 'Échanges fluides et reporting précis.'],
        ];
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'role'       => 'required|string|in:admin,chef_equipe,chef_projet,grh',
            'password'   => 'required|string|min:8',
        ]);

        \App\Models\User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name . ' ' . $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
            'password'   => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->route('admin.settings')->with('success', 'Utilisateur créé avec succès.');
    }

    public function usersEdit(\App\Models\User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function usersUpdate(Request $request, \App\Models\User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'role'       => 'required|string|in:admin,chef_equipe,chef_projet,grh',
            'password'   => 'nullable|string|min:8',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name . ' ' . $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.settings')->with('success', 'Utilisateur mis à jour.');
    }

    public function usersDestroy(\App\Models\User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé.');
    }
}
