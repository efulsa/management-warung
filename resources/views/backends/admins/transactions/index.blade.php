@extends('layouts.main')
@section('title')
    Transaksi
@endsection
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content-main')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <form id="form-borrow" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="name">Pilih Pelanggan</label>
                                            <select class="form-control form-control-sm select2" name="customer_id"
                                                    id="customer_id">
                                                <option></option>
                                                @foreach($user as $name)
                                                    <option value="{{ $name->id }}">{{ $name->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="type">Jenis Transaksi</label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" class="type1" checked name="type"
                                                           id="radioPrimary1" value="1">
                                                    <label for="radioPrimary1">
                                                        Pinjam
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" class="type2" name="type" id="radioPrimary2"
                                                           value="2">
                                                    <label for="radioPrimary2">
                                                        Bayar
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div id="room_fileds" class="col">
                                            <label for="transaction">Jumlah Transaksi</label>
                                            <div class="content">
                                                <input type="text" class="form-control form-control-sm mb-1"
                                                       name="transaction[]" id="rupiah"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="btn-block" for="button" style="color:transparent">dasf</label>
                                            <a type="button" class="btn btn-danger btn-sm text-light btn-block"
                                               id="more_fields" onclick="add_fields();"/><i
                                                class="fa fa-plus-circle text-success"></i> Tambah Input</a>
                                        </div>
                                    </div>
                                </div>
                                <button id="action_button" name="action_button"
                                        class="btn btn-primary btn-sm btn-block"><i class="fa "
                                                                                    id="spinActionButton"></i>Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Informasi Terbaru</h3>
                        </div>
                        <div class="card-body text-center">
                            <h5 id="name-trans"> ... </h5>
                            <h1 id="amount-trans">Rp. ... </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h1 class="text-center">Riwayat Pinjaman</h1>

            <table id="dtTableTrans" class="text-nowrap table table-hover table-sm table-striped">
                <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Pinjam</th>
                    <th class="text-center">Bayar</th>
                    <th class="text-center">Saldo</th>
                    <th class="text-center">Total</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="url-trans-store" value="{{ route('admin.transaction.store') }}">
    <input type="hidden" id="url-dtTableTrans" value="{{ route('admin.dtTableTrans') }}">
    <input type="hidden" id="url-getTrans" value="{{ route('admin.getTrans') }}">
@endsection
@section('script')
    <script src="{{ asset('themes/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('themes/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{ asset('themes/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('features/feature-transaction.js') }}"></script>
@endsection
