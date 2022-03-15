<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;
use App\Models\Comment;

class FeedController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $comments = Comment::commentsAndUsers();
        $allPhotos = Photo::photoFeedWithLikes();

        return view('/feed', compact('allPhotos', 'comments'), [
            'user' => $user,
            'comments' => $comments,
        ]);
    }
}
