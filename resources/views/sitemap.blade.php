
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/09/sitemap.xsd">
    
    <url>
        <loc>{{ route('categories.index') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    
    <url>
        <loc>{{ route('stores.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc>{{ route('whoweare') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('how-it-works') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('informative') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('terms') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    @foreach ($stores as $slug)
        <url>
            <loc>{{ route('stores_events.show', $slug) }}</loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
    
    @foreach ($events as $slug)
        <url>
            <loc>{{ route('stores_events.show', $slug) }}</loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
    
    @foreach ($categories as $slug)
        <url>
            <loc>{{ route('categories.show', $slug) }}</loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>