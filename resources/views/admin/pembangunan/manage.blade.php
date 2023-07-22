@extends('layouts.app')

@section('title')
    Data Pembangunan
@endsection

@section('content')
<div class="tile">
    <div class="row d-flex mb-5">
        <a href="#" class="btn btn-primary mx-3" data-toggle="modal" data-target="#pembangunanModal"><i class="fas fa-plus"></i> Tambah Baru</a>
        <a href="" class="btn btn-secondary"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
    </div>
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Master</th>
                        <th>Nama Pembangunan</th>
                        <th>Deskripsi</th>
                        <th>Total Dana</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembangunan as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->anggaran->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ "Rp. " . number_format($item->amount, 0, ',', '.') }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->date)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h" style="color: #006FC9!important;"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{ route('pembangunan.edit', $item->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                      <a class="dropdown-item text-danger" href="{{ route('pembangunan.delete', $item->id) }}" onclick="return confirm('Anda yakin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- Kas Modal -->
<div class="modal fade" id="pembangunanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background: #006FC9!important; color:white;">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembangunan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('pembangunan.store') }}" method="POST" id="myForm">
            @csrf
            @method('POST')
            <div class="form-group row">
                <label class="control-label col-md-3">Nama Pembangunan <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama pembangunan">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Deskripsi <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <textarea name="description" cols="30" rows="3" class="form-control" placeholder="Deskripsi"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Master Anggaran <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <select name="anggaran_id" id="anggaran_id" class="form-control">
                        <option value="">--Pilih Master--</option>
                        @foreach ($master as $m)
                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Total Dana <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="amount" placeholder="Masukan total dana">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Tanggal <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="date" name="date">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" id="submitBtn" class="btn btn-primary" onclick="validate()">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@push('js')
<script>
    jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
    });
    function validate() {
        $("#myForm").validate({
            rules:{
                name:{
                    required: true,
                },
                description:{
                    required: true,
                },
                anggaran_id:{
                    required: true,
                },
                amount:{
                    required: true,
                    rangelength: [1, 10],
                    number: true
                },
                date:{
                    required: true,
                }
            },
            messages:{
                name: "<p class='text-danger'>Kolom ini diperlukan</p>",
                description: "<p class='text-danger'>Kolom ini diperlukan</p>",
                anggaran_id: "<p class='text-danger'>Kolom ini diperlukan</p>",
                amount:{
                    required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                    rangelength: "<p class='text-danger'>Harga harus diantara 1 sampai 10 digit</p>",
                    number: "<p class='text-danger'>Hanya boleh diisi angka</p>"
                },
                date: "<p class='text-danger'>Kolom ini diperlukan</p>"
            }
        })
        
        if($("#myForm").valid() == false){
            event.preventDefault();
            document.getElementById("submitBtn").disabled = false;
        }else if($("#myForm").valid() == true){
            document.getElementById("submitBtn").disabled = false;
            document.getElementById("submitBtn").innerHTML = "Mohon Tunggu...";
        }                       
    }
</script>
@endpush