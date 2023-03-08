@extends('layouts.app')
@section('content')
    <div class="mainone d-flex flex-wrap">
        @foreach ($data as $track)
            <div value='{{ $track->fichier_audio }}' class="card  d-flex justify-content-center align-items-center"
                style="width:100%;max-width:400px;margin: 1rem;">
                
                <img class="playbtn rounded-circle m-4 mx-auto d-block card-img-top"
                    style="object-fit: cover;width: 150px;height: 150px;" src="{{ $track->image_couverture }}"
                    alt="Card image cap">
                <div class="d-flex justify-content-center">
                    <i class="more fa-sharp fa-solid fa-ellipsis text-warning"></i>
                </div>
                <div class="d-flex flex-column d-flex justify-content-center w-100 position-relative">
                    <div class="d-flex justify-content-center">
                        <p class="text-white" style="font-size: 1rem;">{{ $track->titre }}</p>
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-around">

                    @php
                        $piecesController = new App\Http\Controllers\piecesController();
                        $res = $piecesController->check(['id' => $track->id, 'user_id' => Auth::user()->id]);
                    @endphp
                    <span class="text-warning">Track</span>
                    <a href="{{ route('liked', ['id' => $track->id, 'user_id' => Auth::user()->id]) }}">
                        @if ($res == 0)
                            <i class="fa-solid text-warning fa-heart"></i>
                        @else
                            <i class="fa-regular  text-warning fa-heart"></i>
                        @endif

                    </a>

                </div>
            </div>
        @endforeach
    </div>
@endsection
