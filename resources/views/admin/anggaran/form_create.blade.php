@extends('layouts.app')

@section('title')
    Data Anggaran
@endsection

@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Tambah Anggaran Baru</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{ route('anggaran.store') }}" method="POST" id="myForm">
            @csrf
            @method('POST')
            <div class="form-group row">
                <label class="control-label col-md-3">Nama Anggaran <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama anggaran">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Deskripsi</label>
                <div class="col-md-9">
                <textarea class="form-control" name="description" rows="4" placeholder="Masukan deskripsi"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Jumlah Dana Anggaran <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Masukan jumlah">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Tanggal <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Disetujui oleh <small class="text-danger">*</small></label>
                <div class="col-md-4">
                <select name="signed_by" id="signed_by" class="form-control">
                    <option value="" disabled selected hidden>Klik untuk pilih</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name . " - " . $user->role }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit" id="submitBtn" onclick="validate()">Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('anggaran.index') }}">Cancel</a>
                </div>
              </div>
            </div>
        </form>
      </div>
</div>
@endsection

@push('js')

<script>
    jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
    });
    // Validasi form input sebelum memasukan data ke database
    function validate() {
        $("#myForm").validate({
            rules:{
                name:{
                    required: true,
                },
                description:{
                    required: true,
                },
                amount:{
                    required: true,
                    rangelength: [1, 10],
                    number: true
                },
                date:{
                    required: true,
                },
                signed_by:{
                    required: true,
                }
            },
            messages:{
                name: "<p class='text-danger'>Kolom ini diperlukan</p>",
                description: "<p class='text-danger'>Kolom ini diperlukan</p>",
                amount:{
                    required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                    rangelength: "<p class='text-danger'>Harga harus diantara 1 sampai 10 digit</p>",
                    number: "<p class='text-danger'>Hanya boleh diisi angka</p>"
                },
                date: "<p class='text-danger'>Kolom ini diperlukan</p>",
                signed_by: "<p class='text-danger'>Kolom ini diperlukan</p>",
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
