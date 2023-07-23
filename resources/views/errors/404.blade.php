@extends('layouts.app')

@section('title')
    404 - Page Not Found
@endsection

@section('content')
<div class="page-error tile">
    <h1><i class="fa fa-exclamation-circle"></i> Error 404: Page not found</h1>
    <p>The page you have requested is not found.</p>
    <p><a class="btn btn-primary" href="{{ route('dashboard.index') }}">Go Back</a></p>
</div>
@endsection