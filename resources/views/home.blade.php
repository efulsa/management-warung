@extends('layouts.app')
@section('title')
Print
@endsection
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>{{ date('l, d F Y') }}</h1>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama</th>
                                    <th>Total Pinjaman</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if(!empty($item->borrow->first()->saldo))
                                    <td>Rp. {{ number_format($item->borrow->first()->saldo) }}</td>
                                    @else
                                    <th></th>
                                    @endif
                                    <td>{{ $item->type }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
