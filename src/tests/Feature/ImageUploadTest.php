<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImageUploadTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function image_upload()
    {
        Storage::fake('local');

        $response = $this->json('POST', '/images/upload', [
            'image' => UploadedFile::fake()->image('avatar.png')
        ]);

        // Assert the file was stored...
        Storage::disk('local')->assertExists('public/avatar.png');

        // Assert a file does not exist...
        Storage::disk('local')->assertMissing('avatar.png');
    }
}
