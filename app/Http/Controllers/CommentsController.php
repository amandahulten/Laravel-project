<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|string|max:200',
        ]);

        $database = new Comment();
        $database->comment = $request->input('comment');
        $database->user_id = Auth::id();
        $database->photo_id = $request->input('photo_id');
        $database->save();

        return back()->with('success', 'Comment added successfully.');
    }
}
