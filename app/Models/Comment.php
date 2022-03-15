<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];

    public static function commentsAndUsers()
    {
        //returns all comments along with usernames.
        return User::select()
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->select('users.id as user_id', 'users.name', 'comments.id as comment_id', 'comments.comment', 'comments.created_at', 'comments.photo_id')
            ->get();
    }
}
