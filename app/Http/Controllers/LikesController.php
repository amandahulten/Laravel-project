<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        //check to see if user has already liked before:
        $haveLiked = Like::where('photo_id', $request->id)->where('user_id', $user->id)->where('like', true)->first();

        if (!$haveLiked) {
            $database = new Like();
            $database->user_id = $user->id;
            $database->photo_id = $request->id;
            $database->like = true;
            $database->save();
        } elseif ($haveLiked) {
            $haveLiked->delete();
        }
        return back();
    }
}
