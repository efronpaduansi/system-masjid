@extends('layouts.app')

@section('title')
    Manajemen User
@endsection

@section('content')
<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Data Pengguna</h3>
      <div class="tile-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST" id="myForm">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="control-label col-md-3">Nama Pengguna <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama pengguna" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Email <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input type="text" name="email" class="form-control" placeholder="Masukan email aktif" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Role Akses Pengguna <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <select name="role" class="form-control">
                       <option value="" disabled selected hidden>{{ ($user->role == "administrator") ? "Administrator" : (($user->role == "ketua") ? "Ketua" : "Bendahara") }}</option>
                       <option value="administrator">Administrator</option>
                       <option value="ketua">Ketua</option>
                       <option value="bendahara">Bendahara</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('user.index') }}" class="btn btn-secondary">Tutup</a>
              <button type="submit" id="submitBtn" class="btn btn-primary" onclick="validate()">Simpan</button>
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
                    minlength: 3,
                    maxlength:100,
                },
                email:{
                    required: true,
                    email: true
                },
                role:{
                    required: true
                },
            },
            messages:{
                name:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                   minlength: "<p class='text-danger'>Panjang Nama minimal 3 karakter maksimal 100 karakter!</p>",
                   maxlength: "<p class='text-danger'>Panjang Nama minimal 3 karakter maksimal 100 karakter!</p>",
                },
                email:{
                    required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                    email: "<p class='text-danger'>Format email salah!</p>"
                },
                role:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                },
            }
        });

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
