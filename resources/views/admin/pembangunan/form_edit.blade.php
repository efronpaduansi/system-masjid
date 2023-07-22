@extends('layouts.app')

@section('title')
    Data Pembangunan
@endsection

@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Data Pembangunan</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{ route('pembangunan.update', $pembangunan->id) }}" method="POST" id="myForm">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="control-label col-md-3">Nama Pembangunan <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama pembangunan " value="{{ $pembangunan->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Deskripsi</label>
                <div class="col-md-9">
                <textarea class="form-control" name="description" rows="4" placeholder="Masukan deskripsi">{{ $pembangunan->description }}</textarea>
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
                <label class="control-label col-md-3">Total Dana<small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Masukan total dana" value="{{ $pembangunan->amount }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Tanggal <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control" value="2023-07-01">
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit" id="submitBtn" onclick="validate()">Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('pembangunan.index') }}">Cancel</a>
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
                    rangelength: "<p class='text-danger'>Jumlah kas harus diantara 1 sampai 10 digit</p>",
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