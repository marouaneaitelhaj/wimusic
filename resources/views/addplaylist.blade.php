@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">name</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="name" value=""
                                        required autocomplete="email" autofocus>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        AddPlaylist
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
