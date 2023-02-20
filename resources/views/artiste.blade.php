@extends('layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <div>
        <div class="mt-4 d-flex position-relative" style="height: 15vh; justify-content: center; align-items: center;">
            <img src="{{ $data->image }}" class="img-fluid"
                style="height: 25vh;width:100%;object-fit: cover;filter: brightness(50%);position:absolute;z-index: -1;">
            <p class="text-white" style="text-align: center;">{{ $data->nom }}</p>
        </div>
        <div class="mt-4 p-4 d-flex justify-content-center">
            <div style="background-color: #333333" class="p-4 m-4  w-25">
                <p class="text-white">Detail</p>
                <p class="text-white"><span>Pays:</span><span>{{ $data->pays }}</span></p>
                <p class="text-white"><span>Birthday:</span><span>{{ $data->date_de_naissance }}</span></p>
            </div>
            <div class="m-4 w-75">
                @foreach ($tracks as $track)
                    <div style="background-color: #333333" class=" mt-4 d-flex float-left align-items-center w-75 rounded">
                        <button onclick="playmusic()">
                            <i class="fa-solid fa-play  text-warning "></i>
                        </button>
                        <img class=" run p-2 object-fit-cover rounded-circle" src="{{ $track->image_couverture }}"
                            style="width: 50px;height:50px;">
                        <p class="p-2 text-white">{{ $track->titre }}</p>
                        <p class="ml-auto p-2 text-white">{{ $track->created_at }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
