@extends('layouts.app')
@section('content')
   <div class="d-flex flex-wrap justify-content-center">
    @foreach ($bandes as $bande)
        <div class="card m-3" style="width: 250px;">
            <a href="{{ url('bande/' . $bande->id) }}" class="text-decoration-none">
                <img class="card-img-top" src="{{ $bande->image }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="text-white card-title">{{ $bande->nom }}</h5>
                    <p class="card-text"><small class="text-muted">Bande</small></p>
                </div>
            </a>
        </div>
    @endforeach
</div>

@endsection
