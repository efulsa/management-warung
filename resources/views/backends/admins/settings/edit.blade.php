@extends('layouts.main')
@section('title')
    Pengaturan
@endsection
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Akun</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage akun</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content-main')
<div class="row justify-content-center">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Pengaturan Akun
            </div>
            <div class="card-body">
                <form id="form-setting" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="" autocomplete="off">
                        <span></span>
                    </div>
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-sm btn-block btn-success" type="submit"><i id="btn-loading" class="fa "></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="url-setting" value="{{ route('admin.setting.update') }}">
@endsection
@section('script')
<script src="{{ asset('themes/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('features/feature-setting.js') }}"></script>
@endsection
