@extends('layouts.app')

@section('title', 'Confirmation success')

@section('header_css')
  <link href="/css/login.css" rel="stylesheet">
@stop

@section('footer_js')
  <script type="text/javascript" src="/js/login.bundle.js"></script>
@stop

@section('content')
<div class="notification-page">
  <div class="navbar"><a class="logo navbar__logo" href="/"></a>
    <nav class="nav navbar__nav">
      <a class="nav__link" href="/">Home</a>
      <i class="nav__divider"></i>
      @include('auth.nav')
    </nav>
  </div>
  <div class="notification-page__inner">
    <div class="notification">
      <img src="/media/success@2x.png" width="62"/>
     
      <div class="notification__title notification__title_lg">Confirmation success. Thanks!</div>
      <!-- <div class="notification__content">
          <p>Now you can log in</p>
          <a href="{{ route('f.auth') }}" class="btn btn_primary btn_block">Log In</a>
      </div> -->
    </div>
  </div>
</div>
@stop
