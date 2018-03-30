@extends('layouts.app')

@section('title', 'OiOi.guru Login')

@section('header_css')
  <link href="/css/reset-password.css" rel="stylesheet"></head>
@stop

@section('footer_js')
  <script type="text/javascript" src="/js/reset-password.bundle.js"></script>
@stop

@section('content')
<div class="auth-page auth-page_reset-password">
  <div class="navbar"><a class="logo navbar__logo" href="/"></a>
    <nav class="nav navbar__nav">
      <a class="nav__link" href="/">Home</a>
      <i class="nav__divider"></i>
      @include('auth.nav')
    </nav>
  </div>
  <div class="auth-page__inner">
    <div class="reset-password">
      <div class="reset-password__content">
        <div class="register-success__title text-center reset-password__title">Reset Password</div>
        <div class="register-success__text text-center reset-password__descr">Enter your email below and we'll send you<br>a link to reset your password</div>
        <form action="{{ route('f.auth.reset.post') }}" method="POST" data-form-validate data-form-no-ajax="true">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="form-row">
            <div class="col form-group">
              <label>Email *</label>
              {{ Form::email('email', (isset($email)) ? : '', ['class' => 'form-control form-control_with-border', 'data-rules' => 'required|valid_email'])}}
              {{-- <input class="form-control form-control_with-border" name="email" data-rules="required|valid_email"> --}}
              @if (!empty($emailErrors = $errors->get('email')))
                @foreach ($emailErrors as $error)
                  <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label>Password *</label>
              <input class="form-control form-control_with-border" type="password" name="password" data-rules="required">
              @if (!empty($passErrors = $errors->get('password')))
                @foreach ($passErrors as $error)
                  <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label>Retype password *</label>
              <input class="form-control form-control_with-border" type="password" name="password_confirmation" data-rules="required">
              @if (!empty($passConfErrors = $errors->get('password_confirmation')))
                @foreach ($passConfErrors as $error)
                  <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="text-center">
            <button class="btn btn_primary reset__submit" type="submit">Reset password</button>
          </div>
        </form>
      </div>
      <a class="btn back-to-login" href="{{ route('f.auth') }}">Back to Login</a>
    </div>
  </div>
</div>
@stop
