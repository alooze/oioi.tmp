@extends('layouts.app')

@section('title', 'OiOi.guru Logged In')

@section('header_css')
  <link href="/css/login.css" rel="stylesheet">
@stop

@section('footer_js')
  <script type="text/javascript" src="/js/login.bundle.js"></script>
  <script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script>
$(function() {
    $('#country').on('change', function() {
        $.post('{{ route('ajax.cities') }}', {country:$(this).val(), _token:'{{ csrf_token() }}' }, function(d) {
            var options = d.options;
            $('#city').html(options);
        }, 'json');
    });
});
</script>
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
    <form class="login" action="{{ route('f.auth.first_update') }}" method="POST" data-form-validate>
      {{ csrf_field() }}
      <div class="login__title login__title_lg">Please, fill your profile data</div>
      <div class="login__content">
        <div class="login__local">
          <div class="form-group">
            <label>Email*</label>
            <input class="form-control form-control_with-border" name="email" data-rules="required">
          </div>
          <div class="form-group">
            <label>Company</label>
            <input class="form-control form-control_with-border" name="company" data-rules="required">
          </div>
          <div class="form-group">
            <label>Country</label>
            {{ Form::select('country', $countries, '', ['class' => 'form-control form-control_with-border', 'id' => 'country', 'placeholder' => 'Country']) }}
          </div>
          <div class="form-group">
            <label>City</label>
            {{ Form::select('city', [], ['class' => 'form-control form-control_with-border', 'id' => 'city', 'placeholder' => 'City']) }}
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control form-control_with-border" type="password" name="password" data-rules="required">
          </div>
          <button class="btn btn_primary btn_block" type="submit">Save</button>
          {{-- <div class="login__more">
            <a href="{{ route('f.auth.forgot') }}">Forgot Password</a>•<a href="{{ route('f.auth.register') }}">Register</a>
          </div> --}}
        </div>
        {{-- <div class="login__socials">
          <div class="login__socials-title">Login via social networks</div>
          <div class="login__socials-btns">
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'facebook']) }}"><i class="fa fa-facebook-square"></i><br>Facebook</a>
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'twitter']) }}"><i class="fa fa-twitter"></i><br>Twitter</a>
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'google']) }}"><i class="fa fa-google"></i><br>Gmail</a>
            <a class="btn btn_primary btn_social" href="{{ route('f.auth.social', ['provider' => 'linkedin']) }}"><i class="fa fa-linkedin-square"></i><br>LinkedIn</a>
          </div>
        </div> --}}
      </div>
    </form>
  </div>
</div>
@stop
