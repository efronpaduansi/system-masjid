@extends('auth.layouts.main')

@section('title')
    Login
@endsection

@section('auth-box')
<div class="login-box">
    <form class="login-form" action="index.html">
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">USERNAME</label>
        <input class="form-control" type="text" placeholder="Email" autofocus autocomplete="off">
      </div>
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control" type="password" placeholder="Password">
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
    </form>
  </div>
@endsection