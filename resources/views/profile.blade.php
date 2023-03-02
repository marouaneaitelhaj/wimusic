@extends('layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <div>
        <div class="d-flex justify-content-around">
            <div>
                <h1 class="text-white">{{ $data->name }}</h1>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center m-4">
            @foreach ($playlists as $playlist)
                <div class="card d-flex align-items-center justify-content-center bg-white m-2 p-3"
                    style="width:20%;height:25rem;">
                    <a class="text-decoration-none text-black" href="{{route('playlistSong', ['playlistid' => $playlist->id])}}">
                        <p class="card-text">{{ $playlist->name }}</p>
                    </a>
                </div>
            @endforeach
            <div class="card d-flex align-items-center justify-content-center bg-white m-2 p-3"
                style="width:20%;height:25rem;">
                <a class="text-decoration-none text-black" href="{{ route('addplaylist') }}">
                    <div>
                        <i style="font-size: 15rem;" class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
