@include ('header')
@include('errors')

<p>Hello, {{$user->name}}!</p>
<h1>Welcome to your photos! </h1>
<form action="/photos" method="post">
    @csrf
    <div>
        <label for="photo">Select image to upload: </label>
        <input type="file" id="photo" name="photo">
    </div>
    <div>
        <label for="caption">Write your image caption:</label>
        <textarea name="caption" id="caption" cols="30" rows="10"></textarea>
    </div>
    <input type="submit">
</form>

<div class="container">
    <h3>View all image</h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image id</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imageData as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>
                    <img src="{{ url('public/Photo/'.$data->photo) }}" style="height: 100px; width: 150px;">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include ('footer')
