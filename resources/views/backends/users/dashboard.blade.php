@extends('layouts.main')
@section('title')
Dashboard
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content-main')

<!-- Small boxes (Stat box) -->
<div class="row">
    <!-- ./col -->
    <div class="col-lg-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><sup style="font-size: 20px">Rp. </sup>
                    @if(!empty($total->total))
                    {{ number_format($total->total) }}
                    @else
                    0
                    @endif
                </h3>
                <p>Total Pinjaman</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('user.transaction') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">

</div>
<!-- /.row (main row) -->
@endsection
