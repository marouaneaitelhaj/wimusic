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
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">Email Address</label>

                                <div class="col-md-6">
                                    <input  value="{{old('email')}}" id="email" type="email"
                                        class="form-control" name="email"
                                        value="" required autocomplete="email" autofocus>
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input value="{{old('password')}}" id="password" type="password"
                                        class="form-control" name="password"
                                        required autocomplete="current-password">
                                        @error('password')
                                        <p class="text-danger">something went wrong</p>
                                        @enderror
                                </div>
                            </div>

                           

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        SignUp
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
