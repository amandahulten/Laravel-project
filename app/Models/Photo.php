<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'photo',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function hoursAgo()
    {
        $photoDate = $this->created_at;
        $from = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $to = Carbon::createFromFormat('Y-m-d H:s:i', $photoDate);
        $hoursDifference = $to->diffInHours($from);
        return $hoursDifference;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function photoFeedWithLikes()
    {
        //returns all photos in the database plus flags if the user that is logged in has liked the photo.

        return Photo::join('users', 'users.id', '=', 'photos.user_id')
            ->leftJoin('likes', function ($join) {
                $join->on('likes.photo_id', '=', 'photos.id')
                    ->where('users.id', '=', Auth::user()->id);
            })
            ->select('photos.id as photo_id', 'photos.photo', 'photos.caption', 'photos.created_at', 'photos.user_id', 'users.name', 'likes.user_id as liked')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
