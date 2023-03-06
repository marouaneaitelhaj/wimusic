@extends('layouts.app')
@section('content')
    @foreach ($pieces as $piece)
        <form action="{{ route('update/pieces') }}" id="{{ $piece->id }}" method="POST">
            @csrf
        </form>
    @endforeach
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

        <div class="w-75 d-flex">

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
                        <tr>
                            <th scope="row">#</th>
                            <td>
                                <input placeholder="Add pieces" name="titre" form="{{ $piece->id }}" type="text"
                                    value="">
                            </td>
                            <td></td>
                            <td>
                                <button form="{{ $piece->id }}" class="btn bg-warning" type="submit">Add</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
