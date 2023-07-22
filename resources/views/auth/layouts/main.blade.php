<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- My Style --}}
    <style>
      .btn-primary{
        background: #006FC9;
        border: none;
      }
    </style>
    <title>
        @yield('title')
    </title>
  </head>
  <body>
    <section class="material-half-bg" style="background: #006FC9;">
      <div class="cover" style="background: #006FC9;"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Welcome Back</h1>
      </div>
      @yield('auth-box')
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>