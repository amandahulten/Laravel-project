@include ('header')

<p>Hello, {{$user->name}}!</p>
@foreach($allPhotos as $photos)
<tr>
    <td>{{$photos->caption}}</td>
    <td>
        <img src="{{ url('/uploads/'.$photos->photo) }}" style="height: 100px; width: 150px;">
    </td>
</tr>
@endforeach
@include ('footer')
