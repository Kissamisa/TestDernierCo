<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ImageControllerTest extends TestCase
{
    /** @test */
    public function it_displays_the_gallery_page_with_images()
    {
        Http::fake([
            'api.unsplash.com/photos*' => Http::response([
                [
                    'id' => 'abc123',
                    'urls' => [
                        'small' => 'https://galerie.com/photo.jpg'
                    ]
                ]
            ], 200)
        ]);
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
        $response->assertViewHas('images');
    }
    /** @test */
    public function it_displays_a_single_image_page()
    {
        Http::fake([
            'api.unsplash.com/photos/*' => Http::response([
                'id' => 'abc123',
                'urls' => [
                    'regular' => 'https://galerie.com/photo.jpg'
                ]
            ], 200)
        ]);

        $response = $this->get('/image/abc123');

        $response->assertStatus(200);
        $response->assertViewIs('image');
        $response->assertViewHas('image');
    }
    /** @test */
    public function it_handles_pagination()
    {
        Http::fake([
            'api.unsplash.com/photos*' => Http::response([
                [
                    'id' => 'img1',
                    'urls' => ['small' => 'https://galerie.com/1.jpg']
                ]
            ], 200)
        ]);

        $response = $this->get('/?page=2');

        $response->assertStatus(200);
        $response->assertViewHas('images');
    }
    /** @test */
    public function it_handles_search_query()
    {
        Http::fake([
            'api.unsplash.com/search/photos*' => Http::response([
                'results' => [
                    [
                        'id' => 'cat1',
                        'urls' => ['small' => 'https://galerie.com/cat.jpg']
                    ]
                ]
            ], 200)
        ]);

        $response = $this->get('/?search=chat');

        $response->assertStatus(200);
        $response->assertViewHas('images');
    }
    /** @test */
    public function it_handles_api_error_gracefully()
    {
        Http::fake([
            '*' => Http::response([], 500)
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
