@extends('layouts.app')
@section('content')
    <div class="mainone d-flex justify-content-start flex-wrap">
        @foreach ($data as $track)
            <div value='{{ $track->fichier_audio }}' class="card  d-flex justify-content-center align-items-center"
                style="width:20%;height:25rem;">

                <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top"
                    style="object-fit: cover;width: 150px;height: 150px;" src="{{ $track->image_couverture }}"
                    alt="Card image cap">
                @if (!auth()->guard('admin')->check())
                    <div class="d-flex w-100 justify-content-around">
                        <i class="more fa-sharp fa-solid fa-ellipsis text-warning"></i>
                        <a class="text-warning" href="{{ route('single', ['id' => $track->id]) }}">
                            <i class="fa-solid fa-right-to-bracket text-warning"></i>
                        </a>
                    </div>
                @endif
                <div class="d-flex flex-column d-flex justify-content-center w-100 position-relative">
                    <div class="fixed-top d-none flex-column position-absolute d-flex justify-content-center rounded bg-light"
                        id="hi-div">
                        <p class="text-black m-2">Add to playlist</p>
                        <div>
                            <ul class="list-group">
                                @isset($playlists)
                                    @foreach ($playlists as $playlist)
                                        <a class="text-decoration-none"
                                            href="{{ route('addtoplaylist', ['playlists_id' => $playlist->id, 'song_id' => $track->id]) }}">
                                            <li class="list-group-item">{{ $playlist->name }}</li>
                                        </a>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="text-white">{{ $track->titre }}</p>
                    </div>
                </div>
                @if (!auth()->guard('admin')->check())
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
                @endif
            </div>
        @endforeach
    </div>
@endsection
