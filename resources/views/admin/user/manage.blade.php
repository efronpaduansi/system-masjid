@extends('layouts.app')

@section('title')
    Manajemen User
@endsection

@section('content')
<div class="tile">
    <div class="row d-flex mb-5">
        <a href="#" class="btn btn-primary mx-3" data-toggle="modal" data-target="#userModal"><i class="fas fa-plus"></i> Tambah User</a>
    </div>
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Gabung</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->role == "administrator") ? "Admin" : (($user->role == "ketua") ? "Ketua" : "Bendahara") }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h" style="color: #006FC9!important;"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                      <a class="dropdown-item text-danger" href="{{ route('user.delete', $user->id) }}" onclick="return confirm('Anda yakin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background: #006FC9!important; color:white;">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembangunan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('user.store') }}" method="POST" id="myForm">
            @csrf
            @method('POST')
            <div class="form-group row">
                <label class="control-label col-md-3">Nama Pengguna <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama pengguna">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Email <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input type="text" name="email" class="form-control" placeholder="Masukan email aktif">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Role Akses Pengguna <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <select name="role" class="form-control">
                       <option value="" disabled selected hidden>--Select--</option>
                       <option value="administrator">Administrator</option>
                       <option value="ketua">Ketua</option>
                       <option value="bendahara">Bendahara</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Password <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input type="password" name="password" id="mainpassword" class="form-control" placeholder="Masukan password">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">Konfirmasi Password <small class="text-danger">*</small></label>
                <div class="col-md-9">
                    <input type="password" name="passConf" class="form-control" placeholder="Masukan konfirmasi password">
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
                password:{
                    required: true,
                    minlength: 6,
                },
                passConf:{
                   required: true,
                    equalTo: "#mainpassword"
                }
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
                password:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                   minlength: "<p class='text-danger'>Panjang password minimal 6 karakter!</p>",
                },
                passConf:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                   equalTo: "<p class='text-danger'>Konfirmasi password salah!</p>"
                }
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
