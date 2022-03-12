<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function hoursAgo()
    {
        $photoDate = $this->created_at;
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $photoDate);
        $hoursDifference = $to->diffInHours($from);
        return $hoursDifference;
    }
}
