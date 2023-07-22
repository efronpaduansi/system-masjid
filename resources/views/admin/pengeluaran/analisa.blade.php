@extends('layouts.app')

@section('title')
    Analisa Pengeluaran
@endsection

@section('content')
{{-- Information alert --}}
<div class="alert alert-dark alert-dismissible fade show" role="alert">
    <strong>Informasi!</strong> Halaman ini berisikan data analisa Kas & Pengeluaran per bulan saat  ini.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-success text-light">
            <div class="card-header">
               <h5>Total Kas - {{ date('M') }}</h5>
            </div>
            <div class="card-body">
                <h3>{{ "Rp. " . number_format($totalKas, 0, '.', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-primary text-light">
            <div class="card-header">
                <h5>Total Anggaran - {{ date('M') }}</h5>
            </div>
            <div class="card-body">
                <h3>{{ "Rp. " . number_format($totalAnggaran, 0, '.', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-secondary text-light">
            <div class="card-header">
                <h5>Total Pembangunan - {{ date('M') }}</h5>
            </div>
            <div class="card-body">
                <h3>{{ "Rp. " . number_format($totalPembangunan, 0, '.', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger text-light">
            <div class="card-header">
                <h5>Total Pengeluaran - {{ date('M') }}</h5>
            </div>
            <div class="card-body">
                <h3>{{ "Rp. " . number_format($totalPengeluaran, 0, '.', '.') }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="tile">
    <div class="tile-body">Create a beautiful dashboard</div>
</div>
@endsection