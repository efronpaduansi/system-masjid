@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="tile">
    <div class="tile-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
    </div>
</div>
@endsection