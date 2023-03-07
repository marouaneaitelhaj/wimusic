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
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-around flex-wrap">
                @foreach ($membres as $artiste)
                    <div class="card  d-flex justify-content-center align-items-center" style="width:20%;">
                        <a href="{{ url('artiste/' . $artiste->id) }}" class="text-decoration-none">
                            <img class="rounded-circle m-4 mx-auto d-block card-img-top"
                                style="object-fit: cover;width: 150px;height: 150px;" src="{{ $artiste->image }}"
                                alt="Card image cap">
                            <p class="text-white">{{ $artiste->nom }}</p>
                            <span class="text-warning">Artiste</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
