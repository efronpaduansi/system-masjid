@extends('layouts.app')

@section('title')
    Pengaturan
@endsection

@section('content')
<div class="tile">
    <div class="tile-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Kata Sandi</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Log Login</button>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
              <div class="col-md-4 text-center">
                    <img src="{{ asset('backend/images/avatar.png') }}" alt="avatar" height="120px" width="120px" class="mx-auto my-3"> <br>
                    <strong>{{ Auth::user()->name }}</strong>
                    <p>{{ Auth::user()->email }}</p>
              </div>
              <div class="col-md-8 mt-2">
                  <form action="{{ route('setting.profile-update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="role">Role</label>
                      <input type="text" name="role" id="role" value="{{ Auth::user()->role }}" class="form-control" readonly>
                    </div>
                    <button type="submit" id="save-btn" class="btn btn-outline-success">Update</button>
                  </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h5 class="mt-3 text-center">Ubah Kata Sandi</h5>
          <div class="col-md-4 mx-auto">
            <form action="{{ route('setting.password-update', Auth::user()->id) }}" method="POST" id="myForm">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="oldPass">Kata sandi saat ini</label>
                <input type="password" name="oldPass" id="oldPass" class="form-control">
              </div>
              <div class="form-group">
                <label for="newPass">Kata sandi baru</label>
                <input type="password" name="newPass" id="newPass" class="form-control">
              </div>
              <div class="form-group">
                <label for="newPassConf">Konfirmasi kata sandi baru</label>
                <input type="password" name="newPassConf" id="newPassConf" class="form-control">
              </div>
              <button type="submit" id="submitBtn" class="btn btn-outline-success" onclick="validate()">Update</button>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
           <h5 class="mt-3 mb-3">Aktivitas Login Pengguna</h5>
           @foreach ($userLog as $log)
               <div class="card bg-info p-2 mb-3">
                 <div class="card-header">
                    <p>Aktivitas login</p>
                 </div>
                 <div class="card-body">
                    <p><strong>{{ $log->user->name }}</strong> telah melakukan login pada 
                     <strong> {{ $log->created_at->diffForHumans() }}</strong>. IP address: {{ $log->ip_address }}
                    </p>
                 </div>
               </div>
           @endforeach
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
                oldPass:{
                    required: true,
                },
                newPass:{
                    required: true,
                    minlength: 6,
                },
                newPassConf:{
                   required: true,
                    equalTo: "#newPass"
                }
            },
            messages:{
                oldPass:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                },
                newPass:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                   minlength: "<p class='text-danger'>Panjang password minimal 6 karakter!</p>",
                },
                newPassConf:{
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