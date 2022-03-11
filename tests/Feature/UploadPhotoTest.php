<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\Photo;



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
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->followingRedirects()->post('/photos', [
            'caption' => 'caption of test image',
            'image' => UploadedFile::fake()->image('photo.jpg'),
        ])->assertOk()->assertSeeText('caption of test image');
        $this->assertDatabaseHas('photos', [
            'caption' => 'caption of test image'
        ]);
        //delete the photo after test:
        foreach ($user->photos as $photo) {
            unlink(public_path('uploads/') . $photo->photo);
        }
    }

    public function test_upload_photo_without_a_caption()
    {
        //not working T_T
        $user = User::factory()->create();
        $this->actingAs($user);
        //$this->withoutExceptionHandling();
        $this->followingRedirects()->post('/photos', [
            'image' => UploadedFile::fake()->image('photo.jpg'),
        ])->assertSeeText('The caption field is required.');

        //('caption', 'The caption field is required.');

        //->assertSeeText('The caption field is required.');
    }

    // public function test_upload_photo_without_a_file()
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);

    //     $this->followingRedirects()->post('/photos', [
    //         'caption' => 'caption of test image',
    //     ])->assertSeeText('The image field is required.');
    // }

    // public function test_upload_photo_using_an_invalid_file_type()
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);

    //     $this->followingRedirects()->post('/photos', [
    //         'image' => UploadedFile::fake()->image('photo.pdf'),
    //         'caption' => 'caption of test image',
    //     ])->assertOk()->assertSeeText('The image must be an image.');
    // }
}
