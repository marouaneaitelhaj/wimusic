@extends('layouts.app')
@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($data as $artiste)
            <div class="card mx-2 my-4" style="width: 20rem;">
                <a href="{{ url('artiste/' . $artiste->id) }}" class="text-decoration-none">
                    <img class="rounded-circle mx-auto d-block card-img-top"
                        style="object-fit: cover;width: 150px;height: 150px;" src="{{ $artiste->image }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="text-white card-title">{{ $artiste->nom }}</h5>
                        <span class="badge text-warning">Artiste</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
