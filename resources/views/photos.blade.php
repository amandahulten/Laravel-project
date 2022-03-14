@include ('header')
@include('validations')

<section class="post-list">
    @foreach($user->photos->reverse() as $photo)
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
