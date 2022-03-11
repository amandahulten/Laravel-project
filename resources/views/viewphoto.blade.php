@include ('header')
@include('errors')
<div>

    <div>
        <p>{{$photo->caption}}</p>
        <img src="{{ url('/uploads/'.$photo->photo) }}" style="height: 100px; width: 150px;"></a>
        <form action="{{route('delete')}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$photo->id}}" />
            <button type="submit" class="btn btn-sm btn-danger ml-2">Delete</button>
        </form>
    </div>
</div>
@include('footer')
