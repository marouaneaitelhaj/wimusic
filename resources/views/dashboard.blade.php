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
                <a class="text-decoration-none" href="{{ url('dashboard/artistes') }}">
                    <p class="text-white">Artistes</p>
                </a>
            </div>
            <div>
                <a class="text-decoration-none" href="{{ url('dashboard/addartistes') }}">
                    <p class="text-white">Add Artistes</p>
                </a>
            </div>
            <div>
                <a class="text-decoration-none" href="{{ url('dashboard/pieces') }}">
                    <p class="text-white">Pieces</p>
                </a>
            </div>
            <div>
                <a class="text-decoration-none" href="{{ route('dashboardBandes') }}">
                    <p class="text-white">Bandes</p>
                </a>
            </div>
            <div>
                <a class="text-decoration-none" href="{{ route('Comment') }}">
                    <p class="text-white">Comment</p>
                </a>
            </div>
        </div>

        <div class="w-75 d-flex flex-column">

            @if (url()->current() == url('dashboard/Bandes'))
                @foreach ($bandes as $artiste)
                    <form action="" method="POST" id="{{ $artiste->id }}">
                        @csrf
                    </form>
                @endforeach
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
                        @foreach ($bandes as $artiste)
                            <tr>
                                <th scope="row">{{ $artiste->id }}</th>
                                <td>
                                    <input type="text" value="{{ $artiste->nom }}" name="nom"
                                        form="{{ $artiste->id }}">
                                </td>
                                <td>
                                    <input type="text" value="{{ $artiste->pays }}" name="pays"
                                        form="{{ $artiste->id }}">
                                        <input type="text" value="{{ $artiste->id }}" name="id"
                                        form="{{ $artiste->id }}" hidden>
                                </td>
                                <td>{{ $artiste->update }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        @if ($artiste->ban == 1)
                                            <a href="{{ route('updateBandes', ['id' => $artiste->id]) }}">
                                                <button class="btn btn-danger">Ban</button>
                                            </a>
                                        @endif
                                        @if ($artiste->ban == 0)
                                            <a href="{{ route('updateBandes', ['id' => $artiste->id]) }}">
                                                <button class="btn btn-success">UnBan</button>
                                            </a>
                                        @endif
                                        <a href="{{ route('deleteBandes', ['id' => $artiste->id]) }}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                        <button type="submit" form="{{ $artiste->id }}"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="vh-100 w-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('addbandes') }}" enctype="multipart/form-data" method="POST"
                        class="bg-white d-flex align-items-center p-4 flex-column">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Pays</label>
                                    <input type="text" name="pays" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('addmember') }}" enctype="multipart/form-data" method="POST"
                                    class="bg-white d-flex align-items-center p-4 flex-row justify-content-around">
                                    @csrf
                                    <div class="form-group">
                                        <select class="form-control" name="id_membre" id="">
                                            <option value="">Select Artiste</option>
                                            @foreach ($artistes as $artiste)
                                                <option value="{{ $artiste->id }}">{{ $artiste->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="id_bande" id="">
                                            <option value="">Select Bandes</option>
                                            @foreach ($bandes as $artiste)
                                                <option value="{{ $artiste->id }}">{{ $artiste->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            @endif
            @if (url()->current() == url('dashboard/Comment'))
                <table class="w-100 bg-white table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">user</th>
                            <th scope="col">song</th>
                            <th scope="col">content</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commenter as $artiste)
                            <tr>
                                <th scope="row">{{ $artiste->id }}</th>
                                <td>{{ $artiste->users->name }}</td>
                                <td>{{ $artiste->pieces->titre }}</td>
                                <td>{{ $artiste->comment }}</td>
                                <td>{{ $artiste->created_at }}</td>
                                <td>
                                    <a href="{{ route('deleteComment', ['id' => $artiste->id]) }}">
                                        <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if (url()->current() == url('dashboard/artistes'))
                @foreach ($data as $artiste)
                    <form id="{{ $artiste->id }}" method="POST" action="">
                        @csrf
                    </form>
                @endforeach
                <div class="table-responsive">
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
                                    <td>
                                        <input type="text" form="{{ $artiste->id }}" name="nom"
                                            value="{{ $artiste->nom }}">
                                        <input type="text" form="{{ $artiste->id }}" name="id" hidden
                                            value="{{ $artiste->id }}">
                                    </td>
                                    <td>
                                        <input type="text" form="{{ $artiste->id }}" name="pays"
                                            value="{{ $artiste->pays }}">
                                    </td>
                                    <td>
                                        {{ $artiste->updated_at }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around">
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
                                            <input type="submit" form="{{ $artiste->id }}" class="btn btn-warning"
                                                value="Update">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            @if (url()->current() == url('dashboard/pieces'))
                <div class="table-responsive">
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
                                    <td class="d-flex justify-content-around">
                                        <button form="{{ $piece->id }}" class="btn bg-warning"
                                            type="submit">Update</button>
                                        <a href="{{ route('Deletepieces', ['id' => $piece->id]) }}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                        @if ($piece->ban == 1)
                                            <a href="banP/{{ $piece->id }}">
                                                <button class="btn btn-danger">Ban</button>
                                            </a>
                                        @else
                                            <a href="banP/{{ $piece->id }}">
                                                <button class="btn btn-success">UnBan</button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="vh-100 w-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('addpieces') }}" enctype="multipart/form-data" method="POST"
                        class="bg-white d-flex align-items-center  p-4 flex-column">
                        @csrf
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titre</label>
                                <input value="{{ old('titre') }}" type="text" name="titre" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Image Couverture</label>
                                <input type="file" name="image_couverture" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fichier audio</label>
                                <input type="file" name="fichier_audio" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select Artiste</label>
                                <select class="form-control" name="artiste" id="">
                                    <option value="">Select Artiste</option>
                                    @foreach ($artistes as $artiste)
                                        <option value="{{ $artiste->id }}">{{ $artiste->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
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
    @if (url()->current() == url('dashboard'))
        <div class="d-flex min-vh-100 text-white justify-content-center align-items-center">
            <p class="welcome-message">WELCOME ADMIN</p>
        </div>
    @endif
@endsection
