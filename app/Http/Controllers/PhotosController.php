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
        $imageData = Photo::all();
        return view('/photos', compact('imageData'), [
            'user' => $user
        ]);
    }
    //Store image
    public function storePhoto(Request $request)
    {
        // $request->validate([
        //     'photo' => 'required',
        //     'caption' => 'required'
        // ]);

        // $imageName = time();

        // $photo = new Photo();
        // $request->photo = $request->input('photo');
        // $request->photo->move(public_path('/uploads'), $imageName);
        // $request->caption = $request->input('caption');
        // $request->user_id = Auth::id();
        // $request->save();
        // return back();


        // $this->validate($request, [
        //     'photo' => 'required',
        //     'caption' => 'required'
        // ]);



        // $filename = date('YmdHi') . $request->file('photo');
        // $photo->move('public/uploads', $filename);
        // $photo->photo = $filename;
        // $photo = new Photo();

        // $photo->photo = $request->input('photo');
        // $photo->caption = $request->input('caption');
        // $photo->user_id = Auth::id();
        // $photo->save();

        // return back();
        // $path = $request->file('photo')->store('uploads');
        // return $path;


        /* Store $imageName name in DATABASE from HERE */


        // $data = new Photo();

        // if ($request->file('photo')) {
        //     $file = $request->file('photo');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('public/uploads'), $filename);
        //     $data['photo'] = $filename;
        //     $data->user_id = Auth::id();
        // }
        // $data->save();
        // return redirect()->route('photos.view');
    }
}
