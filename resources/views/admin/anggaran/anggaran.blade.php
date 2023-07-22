@extends('layouts.app')

@section('title')
    {{ $anggaran->name }}
@endsection

@section('content')
    <div class="col-md-10 mx-auto">
        <div class="tile shadow-lg">
            <div class="tile-title text-center">
                RENCANA ANGGARAN BIAYA (RAB) <br>
                <span class="font-weight-bold">MUSHOLA AL-INTISHOR</span> <br>
                <span class="font-weight-bold">TAHUN ANGGARAN: {{ date('Y', strtotime($anggaran->date)) }}</span> <hr>
            </div>
            <div class="tile-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KETERANGAN</th>
                            <th>JUMLAH</th>
                            <th>TANGGAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembangunan as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->amount, 0, ',', '.') }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="3">TOTAL</td>
                        <td>
                            {{ number_format($pembangunan->sum('amount'), 0, ',', '.') }}
                        </td>
                    </tfoot>
                </table>
                <div class="text-center">
                    <p>{{ date('d-m-Y') }}</p>
                    <p>Mengetahui</p> <br>
                    <p>KETUA MASJID</p>
                </div>
                {{-- tombol cetak --}}
                <div class="text-center">
                    <a href="{{ route('anggaran.print', $anggaran->id) }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fa fa-print"></i> Cetak
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
