<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Image Plein Écran</title>

    @vite('resources/css/image.css')
</head>
<body>

    <a href="/">⬅ Retour</a>
    <img src="{{ $image['urls']['regular'] }}" alt="{{ $image['alt_description'] ?? 'Photo Unsplash' }}">

    @vite('resources/js/image.js')
</body>
</html>
