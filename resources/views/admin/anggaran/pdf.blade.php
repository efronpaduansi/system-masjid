<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Rencana Anggaran Biaya (RAB)</title>
  </head>
  <body>
    <div class="col-md-10 mx-auto">
        <div class="card shadow-lg">
            <div class="card-title text-center my-2">
                <h4>RENCANA ANGGARAN BIAYA (RAB)</h4>
                <span class="font-weight-bold">MUSHOLA AL-INTISHOR</span> <br>
                <span class="font-weight-bold">TAHUN ANGGARAN: {{ date('Y', strtotime($anggaran->date)) }}</span> <hr>
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>
    {{-- Script cetak --}}
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>