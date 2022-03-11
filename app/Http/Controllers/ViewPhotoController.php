<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewPhotoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $photoId = 0;
        return view('/viewphoto/?=' . $photoId);
    }
}
