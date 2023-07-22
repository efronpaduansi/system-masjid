<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.includes.meta')
    <title>
        @yield('title')
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- My Style --}}
    <style>
      .btn-primary{
        background: #006FC9!important;
        border: none!important;
      }
      .text-primary{
        color: #006FC9!important;
      }
    </style>
    @include('layouts.includes.style')
    @stack('css')
  </head>
  <body class="app sidebar-mini">
    @include('sweetalert::alert')
    <!-- Navbar-->
    @include('layouts.partials.topbar')
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('layouts.partials.sidebar')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> @yield('title')</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
           @yield('content')
        </div>
      </div>
    </main>
    @stack('js')
    @include('layouts.includes.script')
  </body>
</html>