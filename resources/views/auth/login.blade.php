@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Warung</b>Login</a>
            </div>
            <div class="card-body">

                <form id="form" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        @error('email')
                        <small class="text-red">{{ $message }}</small>
                        @enderror
                        <span class=""></span>
                    </div>
                    <div class="input-group mt-3">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        @error('password')
                        <small class="text-red">{{ $message }}</small>
                        @enderror
                        <span class=""></span>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    @endsection
    @section('script')
    <script src="{{ asset('themes/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('themes/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('features/form-validate.js')}}"></script>
    @endsection
