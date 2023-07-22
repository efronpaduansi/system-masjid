@extends('layouts.app')

@section('title')
    Data Material
@endsection

@section('content')
<div class="tile">
    <div class="row d-flex mb-5">
        <a href="{{ route('material.create') }}" class="btn btn-primary mx-3"><i class="fas fa-plus"></i> Tambah Baru</a>
    </div>
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Tgl</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->unit_price }}</td>
                            <td>{{ "Rp. " . number_format($item->total, 0, ',', '.') }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->order_date)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h" style="color: #006FC9!important;"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{ route('material.edit', $item->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                      <a class="dropdown-item text-danger" href="{{ route('material.delete', $item->id) }}" onclick="return confirm('Anda yakin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection