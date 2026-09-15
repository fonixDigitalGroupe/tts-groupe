<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($pages as $page)
    <url>
        <loc>{{ $racine . $page['chemin'] }}</loc>
        @isset($page['modifie'])
        <lastmod>{{ $page['modifie']->toAtomString() }}</lastmod>
        @endisset
        <changefreq>{{ $page['frequence'] }}</changefreq>
        <priority>{{ $page['priorite'] }}</priority>
    </url>
@endforeach
</urlset>
