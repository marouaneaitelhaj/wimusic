@extends('layouts.app')
@section('content')
    <div class="mainone d-flex justify-content-center flex-wrap">
        @foreach ($data as $track)
            <div value="{{ $track->fichier_audio }}" class="card mx-2 my-4" style="width: 20rem; height: 25rem;">
                <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top"
                    style="object-fit: cover; width: 150px; height: 150px;" src="{{ $track->image_couverture }}"
                    alt="Card image cap">
                @if (!auth()->guard('admin')->check())
                    <div class="d-flex justify-content-around">
                        <i class="more fa-sharp fa-solid fa-ellipsis text-warning"></i>
                        <p class="text-white">{{$track->slug}}</p>
                        {{-- <a class="text-warning" href="{{ route('single', ['slug' => $track->slug]) }}">
                            <i class="fa-solid fa-right-to-bracket text-warning"></i>
                        </a> --}}
                    </div>
                @endif
                <div class="d-flex flex-column justify-content-center align-items-center  position-relative">
                    <div class="fixed-top d-none flex-column position-absolute justify-content-center align-items-center rounded bg-light"
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
                    <div class="d-flex justify-content-center align-items-center w-100 h-100">
                        <p class="text-white text-center">{{ $track->titre }}</p>
                    </div>
                    @if (!auth()->guard('admin')->check())
                        <div class="w-100 d-flex justify-content-around align-items-center">
                            @php
                                $piecesController = new App\Http\Controllers\piecesController();
                                $res = $piecesController->check(['id' => $track->id, 'user_id' => Auth::user()->id]);
                            @endphp
                            <span class="text-warning">Track</span>
                            <a href="{{ route('liked', ['id' => $track->id, 'user_id' => Auth::user()->id]) }}">
                                @if ($res == 0)
                                    <i class="fa-solid text-warning fa-heart"></i>
                                @else
                                    <i class="fa-regular text-warning fa-heart"></i>
                                @endif
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
