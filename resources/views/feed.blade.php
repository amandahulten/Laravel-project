@include ('header')
@include('validations')
@foreach($allPhotos as $photo)

<section class="feed">
    <div class="header">
        <div class="user">{{$user->name}}</div>
        <div class="param">
            <svg aria-label="Plus options" class="_8-yf5 " fill="#262626" height="16" role="img" viewBox="0 0 48 48" width="16">
                <circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle>
                <circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle>
                <circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle>
            </svg>
        </div>
    </div>
    <div class="img-container">
        <img src="{{ url('/uploads/'.$photo->photo) }}">
    </div>
    <div class="toolbar">
        <a class="like">
            <form action="like/{{$photo->photo_id}}" method="POST">@csrf @method('patch')
                <input type="hidden" name="id" value="{{$photo->photo_id}}">
                <button class="noButtonStyling" type="submit">
                    @if($photo->liked)
                    <svg width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.9448 4.00006C12.3787 1.89236 10.4111 0.866667 7.81667 0.866667C3.5 0.808334 0 4.6 0 9.26667C0 13.525 3.15 16.2667 6.18333 18.8917C6.53333 19.1833 6.94167 19.5333 7.29167 19.8833L8.63333 21.05C8.98554 21.3622 9.31359 21.6535 9.61897 21.9247L9.62706 21.9319C11.5419 23.6324 12.5641 24.5401 13.0667 24.8417C13.3583 25.0167 13.7083 25.1333 14 25.1333C14.35 25.1333 14.6417 25.0167 14.9333 24.8417C15.5167 24.4917 16.5667 23.5583 19.4833 20.875L20.65 19.825C20.7811 19.7126 20.9063 19.6002 21.0292 19.4897C21.2891 19.2562 21.5395 19.0313 21.8167 18.8333C24.9083 16.2667 28 13.5833 28 9.26667C28 4.6 24.5 0.808333 20.1833 0.808333C17.5881 0.808333 15.6201 1.83466 14.0537 4.00006L14 4L13.9448 4.00006ZM11.7226 4.10706C11.6622 4.03658 11.6001 3.96748 11.5361 3.89983C11.6095 3.96646 11.6807 4.03474 11.7499 4.10447L11.7226 4.10706Z" fill="#ED4956" />
                    </svg>
                    @else
                    <svg height="24" role="img" viewBox="0 0 48 48" width="24">
                        <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                    </svg>
                    @endif
                </button>
            </form>
        </a>
        <a class="comment">
            <svg fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path>
            </svg>
        </a>
        <a class="transfer">
            <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path>
            </svg>
        </a>
        <a class="signet">
            <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path>
            </svg>
        </a>
    </div>
    <div class="description">{{$photo->caption}}</div>
    <div class="description" style="color: grey"><small>{{ $photo->hoursAgo() }} hours ago</small></div>

    <div style="border-style: solid; border-width: 1px; border-bottom: 0; border-right: 0; border-left: 0; border-color: lightgrey;">
        <form action="{{route('addComment')}}" method="POST">
            @csrf
            <div class="input-group mb-3" style="margin-left: 1px;">
                <input type="hidden" name="photo_id" required value="{{$photo->photo_id}}" />
                <input style="border: 0;" name="comment" required type="text" class="form-control" placeholder="Add a comment..." aria-label="Add a comment" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button style="border: 0; color: lightblue;" class=" btn" type="submit">Post</button>
                </div>
            </div>
        </form>
        @foreach($comments as $comment)

        @if($photo->photo_id == $comment->photo_id)

        <div style="margin-left: 1%">
            <span style="font-weight:700">{{ $comment->name }}:</span> {{ $comment->comment }}

            <div style="color: grey"><small>{{ $comment->created_at }}</small></div>
        </div>

        @endif
        @endforeach

    </div>
    </div>
</section>

@endforeach
@include ('footer')
