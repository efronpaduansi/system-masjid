@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="tile">
    <div class="tile-body">
        <div class="alert alert-success">Selamat datang, {{ Auth::user()->name }}</div>
    </div>
</div>
@endsection