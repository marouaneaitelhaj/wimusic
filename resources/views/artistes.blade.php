@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-around flex-wrap">
        @foreach ($data as $artiste)
            <div class="card  d-flex justify-content-center align-items-center" style="width:20%;">
                <a href="{{ url('artiste/' . $artiste->id) }}" class="text-decoration-none">
                    <img class="rounded-circle m-4 mx-auto d-block card-img-top"
                        style="object-fit: cover;width: 150px;height: 150px;" src="{{ $artiste->image }}" alt="Card image cap">
                    <p class="text-white">{{ $artiste->nom }}</p>
                    <span class="text-warning">Artiste</span>
                </a>
            </div>
        @endforeach
    </div>
@endsection
