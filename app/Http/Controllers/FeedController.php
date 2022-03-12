<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;
use App\Models\Comment;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user = Auth::user();
        $allComments = Comment::all(); //->sortByDesc('created_at');
        $allPhotos = Photo::all()->sortByDesc('created_at');

        return view('/feed', compact('allPhotos', 'allComments'), [
            'user' => $user,
            'comments' => $allComments,
        ]);
    }
}
