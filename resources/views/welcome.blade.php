<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Galerie Unsplash</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .photo {
            background: white;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .photo img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <h1>Galerie photos Unsplash</h1>

    @if(isset($images))
        <div class="gallery">
            @foreach($images as $image)
                <div class="photo">
                    <a href="{{ url('/image/' . $image['id']) }}">
                        <img 
                            src="{{ $image['urls']['small'] }}"
                        >
                    </a>
                </div>
            @endforeach
        </div>
    @endif

</body>
</html>
