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
    <div class="tile-body">
        <div class="row">
            <div class="col-md-8">
                <strong>Terakhir ditambahkan</strong>
                @foreach ($data as $item)
                    <div class="card bg-info text-light mb-3 mt-3">
                        <div class="card-header">
                            <h5>{{ $item->type }}</h5>
                        </div>
                        <div class="card-body">
                            <h4>{{ "Total: Rp. " .number_format($item->total, 0, '.', '.') }}</h4>
                            <p>{{ date('d/m/Y', strtotime($item->date)) }}</small>
                        </div>
                        <div class="card-footer">
                            {{ "Oleh: " .  $item->user->name  }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <strong>Aktivitas Terakhir</strong>
                @foreach ($data as $item)
                    <div class="alert alert-secondary mt-3">
                        <p><strong>{{ $item->user->name }}</strong> telah menambahkan pengeluaran <strong>{{ $item->type }}</strong></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection