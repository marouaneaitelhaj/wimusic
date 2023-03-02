@extends('layouts.app')
@section('content')
    <div class="mainone d-flex justify-content-start flex-wrap">
        @foreach ($data as $playlist)
            <ul class="list-group">
                @foreach ($tracks as $track)
                <li class="list-group-item">{{$track->song_id}}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
