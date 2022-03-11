<?php

?>

@include ('header')
@include('errors')

<p>Hello, {{$user->name}}!</p>
<h1>Welcome to your photos! </h1>

<form action="/photos" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col">

        <div class="row-md-6">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="row-md-6">
            <label for="caption" class="row-md-6">Write your image caption:</label>
            <textarea name="caption" cols="30" rows="10"></textarea>
        </div>

        <div class="col-md-6">
            <button type="submit" class="btn btn-success">Upload</button>
        </div>

    </div>
</form>



<section class="post-list">
    @foreach($user->photos as $photo)

    <!-- <div class="container">
    <div class="gallery"><a href="/viewphoto/{{$photo->id}}"><img src="{{ url('/uploads/'.$photo->photo) }}" style="height: 100px; width: 150px;"></a></div>
</div>
<div>{{$photo->caption}}</div>
</div> -->

    <a href="/viewphoto/{{$photo->id}}" class="post">
        <figure class="post-image">
            <img src="{{ url('/uploads/'.$photo->photo) }}">
        </figure>
        <span class="post-overlay">
            <p>
                {{$photo->caption}}
            </p>
        </span>
    </a>

    @endforeach
</section>
@include ('footer')
