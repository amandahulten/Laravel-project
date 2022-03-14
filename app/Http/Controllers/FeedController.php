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
        $comments = Comment::all();
        $allPhotos = Photo::photoFeedWithLikes();

        return view('/feed', compact('allPhotos', 'comments'), [
            'user' => $user,
            'comments' => $comments,
        ]);
    }
}
