@extends('layouts.app')
@section('content')
    @isset($pieces)
        @foreach ($pieces as $piece)
            <form action="{{ route('update/pieces') }}" id="{{ $piece->id }}" method="POST">
                @csrf
            </form>
        @endforeach
    @endisset
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex w-100 justify-content-around align-items-center">
            <div>
                <a href="{{ url('dashboard/artistes') }}">
                    <p class="text-white">Artistes</p>
                </a>
            </div>
            <div>
                <a href="{{ url('dashboard/addartistes') }}">
                    <p class="text-white">Add Artistes</p>
                </a>
            </div>
            <div>
                <a href="{{ url('dashboard/pieces') }}">
                    <p class="text-white">Pieces</p>
                </a>
            </div>
        </div>

        <div class="w-75 d-flex flex-column">

            @if (url()->current() == url('dashboard/artistes'))
                <table class="w-100 bg-white table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">pays</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $artiste)
                            <tr>
                                <th scope="row">{{ $artiste->id }}</th>
                                <td>{{ $artiste->nom }}</td>
                                <td>{{ $artiste->pays }}</td>
                                <td>{{ $artiste->created_at }}</td>
                                <td>
                                    @if ($artiste->ban == 1)
                                        <a href="ban/{{ $artiste->id }}">
                                            <button class="btn btn-danger">Ban</button>
                                        </a>
                                    @endif
                                    @if ($artiste->ban == 0)
                                        <a href="ban/{{ $artiste->id }}">
                                            <button class="btn btn-success">UnBan</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if (url()->current() == url('dashboard/pieces'))
                <table class="w-100 bg-white table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pieces as $piece)
                            <tr>
                                <th scope="row">{{ $piece->id }}</th>
                                <td>
                                    <input name="titre" form="{{ $piece->id }}" type="text"
                                        value="{{ $piece->titre }}">
                                    <input name="pieceid" hidden form="{{ $piece->id }}" type="text"
                                        value="{{ $piece->id }}">
                                </td>
                                <td>{{ $piece->updated_at }}</td>
                                <td>
                                    <button form="{{ $piece->id }}" class="btn bg-warning"
                                        type="submit">Update</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="vh-100 w-100 m-4">
                    <form action="{{route('addpieces')}}" enctype="multipart/form-data" method="POST" class="bg-white d-flex flex-column">
                        @csrf
                        <div class=" form-group">
                            <label for="">Titre</label>
                            <input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image Couverture</label>
                            <input type="file" name="image_couverture" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fichier audio</label>
                            <input type="file" name="fichier_audio" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select  class="form-control" name="artiste" id="">
                                <option value="">Select Artiste</option>
                                @foreach ($artistes as $artiste)
                                    <option value="{{ $artiste->id }}">{{ $artiste->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            @endif
            @if (url()->current() == url('dashboard/addartistes'))
                <table class="w-100 bg-white table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($toartistes as $artiste)
                            <tr>
                                <th scope="row">{{ $artiste->id }}</th>
                                <td>{{ $artiste->name }}</td>
                                <td>{{ $artiste->created_at }}</td>
                                <td>
                                    @if ($artiste->type == null)
                                        <a href="{{ route('convertToArtistes', ['user' => $artiste]) }}">
                                            <button class="btn btn-danger">OKEY</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
