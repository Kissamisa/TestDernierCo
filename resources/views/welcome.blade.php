<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Galerie Unsplash</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <form method="GET">
        <input
            type="text"
            name="search"
            placeholder="Rechercher une photo..."
            value="{{ $search ?? '' }}"
        >
        <button type="submit" class="photo-link" style="padding:10px;">🔍</button>
    </form>

    <div id="loader">
        <p>Chargement...</p>
    </div>

    <h1>Galerie photos Unsplash</h1>

    <button id="themeBtn">
        🌗 Changer de thème
    </button>

    @if(isset($images))
        <div class="gallery">
            @foreach($images as $image)
                <div class="photo">
                    <a href="{{ url('/image/' . $image['id']) }}" class="photo-link">
                        <img src="{{ $image['urls']['small'] }}">
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    <div style="margin-top: 30px; text-align: center;">
        @if($page > 1)
            <a href="/?page={{ $page - 1 }}&search={{ $search ?? '' }}" class="photo-link">⬅ Précédent</a>
        @endif
        <span style="margin: 0 15px;">Page {{ $page }}</span>
        <a href="/?page={{ $page + 1 }}&search={{ $search ?? '' }}" class="photo-link">Suivant ➡</a>
    </div>
</body>
</html>
