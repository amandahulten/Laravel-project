<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    //view photos section
    public function viewPhotos()
    {
        $user = Auth::user();
        $userPhotos = $user->photos;

        return view('/photos', compact('userPhotos'), [
            'user' => $user,
        ]);
    }


    public function storePhoto(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required|string'

        ]);
        //rename and store photo:
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        //store photo info in the database:
        $upload = new Photo();
        $upload->photo = $imageName;
        $upload->caption = $request->input('caption');
        $upload->user_id = Auth::id();
        $upload->save();
        return back();
    }

    //delete image

    public function deleteImage(Request $request)
    {

        $image = Photo::find($request->id);

        unlink("uploads/" . $image->photo);

        Photo::where("id", $image->id)->delete();

        return back()->with("success", "Image deleted successfully.");
    }
}
