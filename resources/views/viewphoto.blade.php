@include ('header')
@include('errors')
<div>

    <div>
        <p>{{$photo->caption}}</p>
        <img src="{{ url('/uploads/'.$photo->photo) }}" style="height: 100px; width: 150px;"></a>
    </div>
</div>
@include('footer')
