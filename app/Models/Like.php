<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Like extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(Photo::class);
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo', 'photo_id', 'id');
    }
}
