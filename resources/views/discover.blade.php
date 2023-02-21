@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-around flex-wrap">
        @foreach ($data as $track)
        <div value='{{ $track->fichier_audio }}' class="card  d-flex justify-content-center align-items-center" style="width:20%;">
                <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top"
                    style="object-fit: cover;width: 150px;height: 150px;" src="{{ $track->image_couverture }}"
                    alt="Card image cap">
                <p class="text-white">{{ $track->titre }}</p>
                <span class="text-warning">Track</span>
            </div>
        @endforeach
    </div>
@endsection
