@extends('auth.layouts.main')

@section('title')
    Login
@endsection

@section('auth-box')
<div class="login-box">
    <form class="login-form" id="loginForm" action="" method="POST">
      @csrf
      @method('POST')
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">E-MAIL</label>
        <input class="form-control" type="text" name="email" placeholder="Email" autofocus autocomplete="off">
      </div>
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control" type="password" name="password" placeholder="Password">
      </div>
      <div class="form-group btn-container">
        <button type="submit" id="submitBtn" onclick="validate()" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
    </form>
  </div>
@endsection

@push('js')
<script>
    jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
    });
    function validate() {
        $("#loginForm").validate({
            rules:{
                email:{
                    required: true,
                    email: true
                },
                password:{
                    required: true,
                },
            },
            messages:{
                email:{
                    required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                    email: "<p class='text-danger'>Format email salah!</p>"
                },
                password:{
                   required: "<p class='text-danger'>Kolom ini diperlukan</p>",
                },
            }
        });

        if($("#loginForm").valid() == false){
            event.preventDefault();
            document.getElementById("submitBtn").disabled = false;
        }else if($("#loginForm").valid() == true){
            document.getElementById("submitBtn").disabled = false;
            document.getElementById("submitBtn").innerHTML = "Mohon Tunggu...";
        }
    }
</script>