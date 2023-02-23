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
                    <div value='{{ $track->fichier_audio }}' class="card  d-flex justify-content-center align-items-center"
                        style="width:20%;">
                        <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top"
                            style="object-fit: cover;width: 150px;height: 150px;" src="{{ $track->image_couverture }}"
                            alt="Card image cap">
                        <p class="text-white">{{ $track->titre }}</p>
                        <span class="text-warning">Track</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
