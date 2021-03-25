@extends('layouts.main')
@section('title')
Riwayat pinjaman
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Riwayat pinjaman {{ $user->name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Manage pelanggan</a></li>
                    <li class="breadcrumb-item active">Riwayat pinjaman</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content-main')
<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                        <table id="dtTableDetail" class="table table-sm table-hover table-bordered table-striped table-responsive text-nowrap">
                            <thead>
                                <tr class="text-center align-center flex-nowrap">
                                    <th style="width: 5%;">No</th>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>Pinjam</th>
                                    <th>Bayar</th>
                                    <th>Satus</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="id-detail" value="{{ $user->id }}">
<input type="hidden" id="url-detail" value="{{ route('admin.dtTableDetail') }}">
@endsection
@section('script')
<script src="{{ asset('features/feature-detail-user.js') }}"></script>
@endsection
