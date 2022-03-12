<?php

namespace App\Models;

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
}
