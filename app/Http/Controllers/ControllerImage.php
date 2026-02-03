<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ControllerImage extends Controller
{
    public function fetchImages()
    {
        $response = Http::get(
            'https://api.unsplash.com/photos?client_id=' . env('UNSPLASH_ACCESS_KEY')
        );

        $images = $response->json();

        #dd($images);

        return view('welcome', ['images' => $images]);
    }
    public function showImage($id)
    {
        $response = Http::get(
            'https://api.unsplash.com/photos/' . $id . '?client_id=' . env('UNSPLASH_ACCESS_KEY')
        );

        $image = $response->json();

        return view('image', ['image' => $image]);
    }
}
