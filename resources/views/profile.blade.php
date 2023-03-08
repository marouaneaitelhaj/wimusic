@extends('layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <div>
        <div class="d-flex justify-content-around">
            <div>
                <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top" src="{{ $data->image }}"
                    alt="Card image cap" style="object-fit: cover; width: 150px; height: 150px;">
                <h1 class="text-white">{{ $data->name }}</h1>
            </div>
        </div>
        <div class="d-flex justify-content-center bg-black align-items-center p-4">
            <div class="w-50 d-flex flex-column justify-content-center">
                <h1 class="text-warning">All the tools you need to build your following and career on Wimusic</h1>
                <p class="text-warning">all in one place.</p>
            </div>
            <div class="w-50 d-flex align-items-end flex-column">
                <div>
                    @if (session('success'))
                        <p class="text-success">{{ session('success') }}</p>
                    @endif
                    @error('user_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <form action="{{ route('ToArtistes', ['user_id' => $data->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-warning">Join Wimusic for Artists</button>
                </form>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center m-4">
            @foreach ($playlists as $playlist)
                <div class="card d-flex align-items-center justify-content-center bg-white m-2 p-3"
                    style="width:100%;max-width:15rem;min-height:15rem;">
                    <a class="text-decoration-none text-black"
                        href="{{ route('playlistSong', ['playlistid' => $playlist->id]) }}">
                        <p class="card-text">{{ $playlist->name }}</p>
                    </a>
                </div>
            @endforeach
            <div class="card d-flex align-items-center justify-content-center bg-white m-2 p-3"
                style="width:100%;max-width:15rem;min-height:15rem;">
                <a class="text-decoration-none text-black" href="{{ route('addplaylist') }}">
                    <div>
                        <i style="font-size: 10rem;" class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </div>
            <div class="card d-flex align-items-center justify-content-center bg-white m-2 p-3"
                style="width:100%;max-width:15rem;min-height:15rem;">
                <a class="text-decoration-none text-black" href="{{ route('likedsongs') }}">
                    <div>
                        <i style="font-size: 10rem;" class="fa-solid fa-heart"></i>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection
