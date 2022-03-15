<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DeletePhotoTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_photo()
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

        $this->followingRedirects(route('delete'));

        $this->assertDatabaseMissing('photos', [
            'photo' => 'caption',
        ]);

        // TO DO!!
        //assertDatabaseMissing()a
    }
}
