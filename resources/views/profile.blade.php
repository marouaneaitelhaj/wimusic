@extends('layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <div>
        <div class="d-flex justify-content-around">
            <div>
            <h1 class="text-white">{{$data->name}}</h1>
            </div>
        </div>
    </div>
@endsection
