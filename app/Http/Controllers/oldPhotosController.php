<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    //view photos section
    public function viewPhotos()
    {
        $imageData = Post::all();
        return view('photos', compact('imageData'));
    }
    //Store image
    public function storePhoto(Request $request)
    {
        $data = new Post();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/uploads'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        return redirect()->route('photos.view');
    }
}

$this->validate($request, [
    'name' => 'required|string',
    'email' => 'required|string',
    'password' => 'required|string'
]);

$user = Post::create(request(['name', 'email', 'password']));

auth()->login($user);

return redirect()->to('/feed');
