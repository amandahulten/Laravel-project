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


<div class="container">
    <h3>View all image</h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Caption</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->photos as $photo)
            <tr>
                <td>{{$photo->caption}}</td>
                <td>
                    <img src="{{ url('/uploads/'.$photo->photo) }}" style="height: 100px; width: 150px;">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include ('footer')
