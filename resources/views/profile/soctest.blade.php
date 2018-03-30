@extends('layouts.app')

@section('header_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
@stop

@section('content')
<div class="container">
    <div class="content">
        <div class="title">Laravel 5</div>
        <div class="col-md-12 text-center">
            <p>Login with</p>
            <p><a href="{!! route('f.auth.social', 'linkedin') !!}">Linkedin</a></p>
            <p><a href="{!! route('f.auth.social', 'google') !!}">Google</a></p>
            <p><a href="{!! route('f.auth.social', 'facebook') !!}">Facebook</a></p>
            <p><a href="{!! route('f.auth.social', 'twitter') !!}">Twitter</a></p>
        </div>
    </div>
</div>
@stop

@section('footer_js')
<script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
@stop
