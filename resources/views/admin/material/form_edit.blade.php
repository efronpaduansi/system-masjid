@extends('layouts.app')

@section('title')
    Data Material
@endsection

@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Material</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{ route('material.update', $material->id) }}" method="POST" id="myForm">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="control-label col-md-3">Kode <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="code" value="{{ $material->code }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Nama <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama material" value="{{ $material->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Deskripsi</label>
                <div class="col-md-9">
                <textarea class="form-control" name="description" rows="4" placeholder="Masukan deskripsi">{{ $material->description }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Satuan <small class="text-danger">*</small></label>
                <div class="col-md-4">
                <select name="unit" id="unit" class="form-control">
                    <option value="{{ $material->unit }}" disabled selected hidden>{{ $material->unit }}</option>
                    <option value="Kg">Kg</option>
                    <option value="Pcs">Pcs</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Harga per Satuan <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="text" name="unit_price" id="unit_price" class="form-control" placeholder="Masukan harga" value="{{ $material->unit_price }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Jumlah <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Masukan jumlah" value="{{ $material->amount }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Tanggal Order <small class="text-danger">*</small></label>
                <div class="col-md-4">
                    <input type="date" name="order_date" class="form-control" value="2023-07-01">
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit" id="submitBtn" onclick="validate()">Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('material.index') }}">Cancel</a>
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
                unit:{
                    required: true,
                },
                unit_price:{
                    required: true,
                    rangelength: [1, 6],
                    number: true
                },
                amount:{
                    required: true,
                    rangelength: [1, 6],
                    number: true
                },
                order_date:{
                    required: true,
                }
            },
            messages:{
                name: "<p class='text-danger'>Kolom ini diperlukan</p>",
                unit: "<p class='text-danger'>Kolom ini diperlukan</p>",
                unit_price:{
                    required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                    rangelength: "<p class='text-danger'>Harga harus diantara 1 sampai 6 digit</p>",
                    number: "<p class='text-danger'>Hanya boleh diisi angka</p>"
                },
                amount:{
                    required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                    rangelength: "<p class='text-danger'>Harga harus diantara 1 sampai 6 digit</p>",
                    number: "<p class='text-danger'>Hanya boleh diisi angka</p>"
                },
                order_date: "<p class='text-danger'>Kolom ini diperlukan</p>"
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