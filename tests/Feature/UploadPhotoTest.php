<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;





class UploadPhotoTest extends TestCase
{

    use RefreshDatabase;
    public function test_view_upload_photo_form()
    {
        $user = User::factory()->create();
        // I have checked with Vincent - it is ok that $user is red - it is a fault with the editor. /Emma
        $this->actingAs($user);
        $response = $this->get('/addphoto');
        $response->assertOk();
    }

    public function test_upload_photo()
    {
        $file = UploadedFile::fake()->create('photo.jpg', 144);
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->followingRedirects()->post('/photos', [
            'caption' => 'caption of test image',
            'image' => $file
        ])->assertOk()->assertSeeText('caption of test image');
        $this->assertDatabaseHas('photos', [
            'photo' => $user->name . time() . '.jpg',
        ]);

        //delete the photo after test:
        unlink(public_path('uploads/') . $user->name . time() . '.jpg');
    }

    public function test_unable_to_upload_photo_without_a_caption()
    {
        $file = UploadedFile::fake()->create('photo.jpg', 144);
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->followingRedirects()->post('/photos', [
            'image' => $file,
        ]);
        $this->assertDatabaseMissing('photos', [
            'photo' => $user->name . time() . '.jpg',
        ]);
    }

    public function test_unable_to_upload_photo_without_a_file()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->followingRedirects()->post('/photos', [
            'caption' => 'caption of test image',
        ]);
        $this->assertDatabaseMissing('photos', [
            'caption' => 'caption of test image'
        ]);
    }

    public function test_unable_to_upload_photo_using_an_invalid_file_type()
    {
        $file = UploadedFile::fake()->create('photo.pdf', 144);
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->followingRedirects()->post('/photos', [
            'image' => $file,
            'caption' => 'caption of test image',
        ]);
        $this->assertDatabaseMissing('photos', [
            'photo' => $user->name . time() . '.pdf',
        ]);
    }

    public function test_unable_to_upload_photo_too_large()
    {
        $file = UploadedFile::fake()->create('photo.jpg', 2001);
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->followingRedirects()->post('/photos', [
            'image' => $file,
            'caption' => 'caption of test image',
        ]);
        $this->assertDatabaseMissing('photos', [
            'caption' => 'caption of test image',
        ]);
    }
}
