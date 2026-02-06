<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControllerImage extends Controller
{
    public function fetchImages(Request $request)
{
    sleep(5); // Simulate loading
    $page = $request->get('page', 1);
    $search = $request->get('search');

    if ($search) {
        $response = Http::get('https://api.unsplash.com/search/photos', [
            'client_id' => env('UNSPLASH_ACCESS_KEY'),
            'query' => $search,
            'page' => $page,
            'per_page' => 10,
        ]);

        $images = $response->json()['results'];
    } else {
        $response = Http::get('https://api.unsplash.com/photos', [
            'client_id' => env('UNSPLASH_ACCESS_KEY'),
            'page' => $page,
            'per_page' => 10,
        ]);

        $images = $response->json();
    }

    return view('welcome', compact('images', 'page', 'search'));
}


    public function showImage($id)
    {
        $response = Http::get(
            'https://api.unsplash.com/photos/' . $id,
            ['client_id' => env('UNSPLASH_ACCESS_KEY')]
        );

        $image = $response->json();

        return view('image', ['image' => $image]);
    }
}
