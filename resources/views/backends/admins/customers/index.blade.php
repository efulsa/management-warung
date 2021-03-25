@extends('layouts.main')
@section('title')
Pelanggan
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Pelanggan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage pelanggan</li>
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
                <button id="create-record" class="btn btn-sm btn-success rounded"><i class="fa fa-plus"></i>
                    Tambah</button>
            </div>
            <div class="card-body">
                <input type="hidden" id="url-dtTableCustomer" value="{{ route('admin.dtTableCustomer') }}">
                <div class="row justify-content-center">
                    <div class="col">
                        <table id="dtTableCustomer" class="table table-sm table-hover table-bordered table-striped table-responsive-lg text-nowrap">
                            <thead>
                                <tr class="text-center align-center flex-nowrap">
                                    <th style="display: none;"></th>
                                    <th>No. </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pinjaman</th>
                                    <th class="text-nowrap">Opsi</th>
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
@include('backends.admins.customers.modal')
@endsection
@section('script')
<script src="{{ asset('themes/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('themes/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('features/feature-user.js') }}"></script>
@endsection
