@extends('layouts.app')

@section('content')
    <div class="d-flex d-flex justify-content-around">
        <div value='{{ $track->fichier_audio }}' class="w-25 card  d-flex justify-content-center align-items-center"
            style="width:20%;height:25rem;">

            <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top"
                style="object-fit: cover;width: 150px;height: 150px;" src="{{ $track->image_couverture }}"
                alt="Card image cap">
            <div class="d-flex w-100 justify-content-around">
                <i class="more fa-sharp fa-solid fa-ellipsis text-warning"></i>

            </div>
            <div class="d-flex flex-column d-flex justify-content-center w-100 position-relative">
                <div class="fixed-top d-none flex-column position-absolute d-flex justify-content-center rounded bg-light"
                    id="hi-div">
                    <p class="text-black m-2">Add to playlist</p>
                    <div>
                        <ul class="list-group">
                            @foreach ($playlists as $playlist)
                                <a class="text-decoration-none"
                                    href="{{ route('addtoplaylist', ['playlists_id' => $playlist->id, 'song_id' => $track->id]) }}">
                                    <li class="list-group-item">{{ $playlist->name }}</li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="text-white">{{ $track->titre }}</p>
                </div>
            </div>
            <div class="w-100 d-flex justify-content-around">

                @php
                    $piecesController = new App\Http\Controllers\piecesController();
                    $res = $piecesController->check(['id' => $track->id, 'user_id' => Auth::user()->id]);
                @endphp
                <span class="text-warning">Track</span>
                <a href="{{ route('liked', ['id' => $track->id, 'user_id' => Auth::user()->id]) }}">
                    @if ($res == 0)
                        <i class="fa-solid text-warning fa-heart"></i>
                    @else
                        <i class="fa-regular  text-warning fa-heart"></i>
                    @endif

                </a>

            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="h-100 d-flex flex-column justify-content-end">
                <div class="overflow-auto p-2 bg-black comments-section" style="height: calc(50vh - 60px);">
                    <!-- subtracting the height of the form below -->
                    @foreach ($commenter as $comment)
                        <div class="comment d-flex">
                            @if ($comment->users->name == Auth::user()->name)
                                <div class="p-2 commenter text-warning">{{ $comment->users->name }}</div>
                                <div class="ml-auto p-2 comment-content font-weight-light text-white">
                                    {{ $comment->comment }}
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('deleteComment', ['id' => $comment->id]) }}">
                                        <i class="fa-solid fa-trash text-warning"></i>
                                    </a>
                                </div>
                            @else
                                <div class="p-2 commenter text-warning">{{ $comment->users->name }}</div>
                                <div class="ml-auto p-2 comment-content font-weight-light text-white">
                                    {{ $comment->comment }}
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
                <div class="p-2">
                    <form method="POST" action="{{ route('addComment') }}" class="add-comment-form">
                        @csrf
                        <input type="number" name="song_id" hidden value="{{ $track->id }}">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control " name="comment" id="comment-content" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-comment"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
