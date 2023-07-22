@extends('layouts.app')

@section('title')
    Data Anggaran
@endsection

@section('content')
<div class="tile">
    <div class="row d-flex mb-5">
        <a href="{{ route('anggaran.create') }}" class="btn btn-primary mx-3"><i class="fas fa-plus"></i> Tambah Baru</a>
        {{-- <a href="" class="btn btn-secondary"><i class="fas fa-cloud-download-alt"></i> Unduh</a> --}}
    </div>
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Total</th>
                        <th>Tahun Anggaran</th>
                        <th>Disetujui Oleh</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggaran as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ "Rp. " . number_format($item->amount, 0, ',', '.') }}</td>
                            <td>{{ date('Y', strtotime($item->date)) }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h" style="color: #006FC9!important;"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{ route('anggaran.detail', $item->id) }}"><i class="fas fa-eye"></i> Detail</a>
                                      <a class="dropdown-item" href="{{ route('anggaran.edit', $item->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                      <a class="dropdown-item text-danger" href="{{ route('anggaran.delete', $item->id) }}" onclick="return confirm('Anda yakin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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