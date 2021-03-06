<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

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
        //note: php.ini only allows for a maximum file size of 2MB.
        //I set the max file size in the validation to the same size
        //to avoid bugs while running locally. /Emma
        $user = Auth::user();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'caption' => 'required|string|max:200'

        ]);
        //rename and store photo:
        $imageName = $user->name . time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        //store photo info in the database:
        $database = new Photo();
        $database->photo = $imageName;
        $database->caption = $request->input('caption');
        $database->user_id = Auth::id();
        $database->save();
        return back()->with('success', 'Image uploaded successfully.');
    }

    //delete image

    public function deleteImage(Request $request)
    {

        $image = Photo::find($request->id);

        unlink('uploads/' . $image->photo);

        Photo::where('id', $image->id)->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    public function viewSinglePhoto(Request $request)
    {
        $user = Auth::user();
        $image = Photo::find($request->id);

        //if statement to prevent user from manipulating the URL to view a photo ID that
        //does not exist or belong to the user. User will then be redirected back to their
        //photo album.
        if (empty($image->user_id) || $image->user_id != $user->id) {
            $userPhotos = $user->photos;

            return view('/photos', compact('userPhotos'), [
                'user' => $user,
            ]);
        } else {
            $comments = Comment::whereIn('photo_id', [$request->id]);
            // return view('viewphoto', ['photo' => $image], ['user' => $user], ['comments' => $comments]);
            //dd($photo);

            return view('viewphoto', compact('image', 'comments'), [
                'user' => $user,
                'photo' => $image,
                'comments' => $comments,
            ]);
        }
    }
}
