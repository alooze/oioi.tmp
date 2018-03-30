@extends('layouts.app')

@section('title', 'OiOi.guru Login')

@section('header_css')
  <link href="/css/login.css" rel="stylesheet">
@stop

@section('footer_js')
  <script type="text/javascript" src="/js/login.bundle.js"></script>
@stop

@section('content')
<div class="auth-page">
  <div class="navbar"><a class="logo navbar__logo" href="/"></a>
    <nav class="nav navbar__nav">
      <a class="nav__link" href="/">Home</a>
      <i class="nav__divider"></i>
      @include('auth.nav')
    </nav>
  </div>
  <div class="auth-page__inner">
    <form class="login" action="{{ route('f.auth.login') }}" method="POST" data-form-no-ajax="true">
      {{ csrf_field() }}
      <div class="login__title login__title_lg">Login</div>
      <div class="login__content">
        <div class="login__local">
          <div class="form-group">
            <label>Email</label>
            {{ Form::email('email', (isset($email)) ? : '', ['class' => 'form-control form-control_with-border', 'data-rules' => 'required|valid_email'])}}
            {{-- <input class="form-control form-control_with-border" name="email" data-rules="required"> --}}
            @if (!empty($emailErrors = $errors->get('email')))
              @foreach ($emailErrors as $error)
                <div class="invalid-feedback">{{ $error }}</div>
              @endforeach
            @endif
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control form-control_with-border" type="password" name="password" data-rules="required">
            @if (!empty($passErrors = $errors->get('password')))
              @foreach ($passErrors as $error)
                <div class="invalid-feedback">{{ $error }}</div>
              @endforeach
            @endif
          </div>
          <button class="btn btn_primary btn_block" type="submit">Log In</button>
          <div class="login__more">
            <a href="{{ route('f.auth.forgot') }}">Forgot Password</a>•<a href="{{ route('f.auth.register') }}">Register</a>
          </div>
        </div>
        <div class="login__socials">
          <div class="login__socials-title">Login via social networks</div>
          <div class="login__socials-btns">
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'facebook']) }}"><i class="fa fa-facebook-square"></i><br>Facebook</a>
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'twitter']) }}"><i class="fa fa-twitter"></i><br>Twitter</a>
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'google']) }}"><i class="fa fa-google"></i><br>Gmail</a>
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'linkedin']) }}"><i class="fa fa-linkedin-square"></i><br>LinkedIn</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@stop
