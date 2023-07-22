@extends('layouts.app')

@section('title')
    Kas Masjid
@endsection

@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Kas</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{ route('kas.update', $kas->id) }}" method="POST" id="myForm">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="control-label col-md-3">Judul <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="title" placeholder="Masukan judul kas " value="{{ $kas->title }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Deskripsi</label>
                <div class="col-md-9">
                <textarea class="form-control" name="description" rows="4" placeholder="Masukan deskripsi">{{ $kas->description }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Jumlah Kas<small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Masukan jumlah" value="{{ $kas->amount }}">
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
                  <button class="btn btn-primary" type="submit" id="submitBtn" onclick="validate()">Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('kas.index') }}">Cancel</a>
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
                title:{
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
                }
            },
            messages:{
                title: "<p class='text-danger'>Kolom ini diperlukan</p>",
                description: "<p class='text-danger'>Kolom ini diperlukan</p>",
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