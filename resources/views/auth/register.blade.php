@extends('layouts.app')

@section('title', 'OiOi.guru Registration')

@section('header_css')
<link href="/css/index.css" rel="stylesheet">
<link href="/css/register.css" rel="stylesheet">
@stop

@section('footer_js')
<script type="text/javascript" src="/js/register.bundle.js"></script>
@stop

@section('content')
<div class="auth-page auth-page_register">
  <div class="navbar">
    <a class="logo navbar__logo" href="/"></a>
    <nav class="nav navbar__nav">
      <a class="nav__link" href="/">Home</a>
      <i class="nav__divider"></i>

      @include('auth.nav')

    </nav>
  </div>
  <div class="auth-page__inner">

    <div class="register-success" style="display: none;">
      <img class="register-success__img" src="data:image/png;base64,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"
        srcset="data:image/png;base64,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 2x">
      <div class="register-success__title">Thank you for registering!</div>
      <div class="register-success__text">Now you can log in as a Producer</div>
      <a class="btn btn_primary register-success__link" href="{{ route('f.auth') }}">Log in</a>
    </div>

    <div class="register">
      <div class="register__title">Registration</div>
      <div class="register__content">
        <form class="register__left" id="register-form" action="{{ route('f.auth.register.post') }}" method="POST" data-form-validate>
          {{ csrf_field() }}
          <input type="hidden" name="role" value="producer">
          <ul class="register__steps" data-steps-indicators>
            <li class="register__step active" data-step="1">
              <div class="register__step-icon">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAYAAAAiYZ4HAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAMhJREFUKJGVkLGKwlAQRU+SxlZQSLOl4KfY+gVW8aPcctd/sLCys7Heeq20sVQwy9nmPX1oDPHAwDBzL9wZVJIaqxu1DrUJs5uGB8POZ3avDGWDOFJGXc6dIa8ZxCY1XFsM9a1LIhXqsSHOMewaj64aDFXbl1Bn6jbU7HGfqQB9oAImwAVYhMRzoAesgE/ghDpSDy0vjRzUEep3B3HkK1N/gY+Wl6bsM7UGio6Gv8xwdVdyYP2Gfo2aq1N1qf6o5+TIc5gtgyb/B3lDlZZMDRkVAAAAAElFTkSuQmCC"
                  srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAfCAYAAAD9cg1AAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAbBJREFUSIm1lr1OFVEUhb+ZqEADwWiMiaINYjRaQUligsaC1megND6KQqkV7yAVz0BxLfy7IeFSSGHgdpD481nMGTJe75x7ZmRWspvZe6915pyzVw4qE+KFuqMeqT9DHKnvQy7aH0tm6raTsR1qGwtsJJCX2KjjyVRq8Bm4V5ccU3t/XKJOYAE4SCSv9hyOfsxrilNXXsXSuI91AjdaCFxvInC5hcBUE4GTFgLHTQS+tBAY2xO7pgPgdiL5IcUt+gd1fwCwmUger41M8pTaS5jiXqhtbBWot9R+hLwfalqZXRlz6ht1WCEeqq/V2Un9sUMGuAbcBD5QzEZ5kAPgB/AI+AZ8Tz2DTF1Vt0a25q26rF4Ksay+q+S/hp5VR6y7Sr6i7kX2OxV7YQF/CTxRzy6AvMRp4CRTrwB90ocqFQNgMQfWOyCH4kKs58DzDshLPMuBBx0KPMyBux0KLOTAbIcC85n6G8g6EviVadwr/hc5MOyQf5gDa8B+B+T7wFppFTPqK/XTBdjER/WlOm2NXS8CT4HHFA+wO8BVYAaYDjVnwCnFS+KA4unYA3YpbOccfwDUTHs7mARjUgAAAABJRU5ErkJggg== 2x">
              </div>
              <div class="register__step-text">Personal Information</div>
            </li>
            <li class="register__step" data-step="2">
              <div class="register__step-icon">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAJxJREFUKJGdz70JAkEQxfEniFXYh6mYXgnGflxsYAEWcA0oWIMNGZoIxwZmyt/EgfHw1rl9MMkyv7eMAAVnA7TA1t6isOY7+yjuQsuuFAK0pRBgXQprem7OwRewst2hcOn3PayGQI9HwAS4RKHHJ2D2o6AXGp4CTyB1CrLQ8MH9lID5p2CRg4ZvDj+A5h+yGUu6SrpLOko6S0oK5g2KEci70pW+kwAAAABJRU5ErkJggg=="
                  srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAATpJREFUSInF1j9KxEAUx/HfBlQQQbD2ElpoITaCaJXOQgVvYOUNPIiVpRfQYhthcTvtvIKlCCsu6NciCcbZmWzmH/uD6Yb34YU35AlQhrMPjIAxcGS7kwM9ACb8ZQqUueES+GI2U+A0F1zWgCvfwHlqeB46gw8ARaaUdCdpqef9H0knsbAv2uS1WAAqSZ+hHUehko5zDpItE6p37j3VSVBfOBnqAydF+8Ix6DuwZ6ubG9111V4I2gVnRV3wAHjMibpgAetU20MW1AYXgbgXasKbwAOw6ol7oyZ8XRcaeuBBaBteBt5aBfvgwWgbPrN004VHoW145PiUQ2DNwO9j0QbecqBNxjUYBZmnkHQ5Z2PYkXQbsGl0B/jo6PYJuABWUncs/k8zVP/PG2A7NWbCh8AL8AxcARs5web8AhBN2otW7TwWAAAAAElFTkSuQmCC 2x">
              </div>
              <div class="register__step-text">General Information</div>
            </li>
          </ul>
          <div class="retister__steps-content" data-steps-content>
            <div class="register__step-pane active" data-step="1">
              <div class="register__form-who-you-are">
                <div class="register__who-you-are-text">Choose, who you are:</div>
                <a class="tab-link tab-link_sm active" data-name="role" data-value="Producer" data-toggle="option">Producer</a>
                {{--
                <a class="tab-link tab-link_sm" data-name="role" data-value="Financier" data-toggle="option">Financier</a>
                <a class="tab-link tab-link_sm" data-name="role" data-value="Distributor" data-toggle="option">Distributor</a> --}}
              </div>
              <div class="register__form">
                <div class="form-row">
                  <div class="col form-group">
                    <label>First name *</label>
                    <input class="form-control form-control_with-border" name="firstname" data-rules="required|callback_check_name" data-display="first name">
                  </div>
                  <div class="col form-group">
                    <label>Last name *</label>
                    <input class="form-control form-control_with-border" name="lastname" data-rules="required|callback_check_name" data-display="last name">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col form-group">
                    <label>Mobile Number *</label>
                    {{-- <div class="number-fieldset">
                      <select name="number_code" data-choices data-class-names-container-outer="choices choices_with-border" data-rules="required">
                        <option value="44" selected>+44</option>
                        <option value="00">+00</option>
                      </select> --}}
                      <input class="form-control form-control_with-border" name="phone" data-rules="required|numeric" data-display="mobile number">
                    {{-- </div> --}}
                  </div>
                  <div class="col form-group">
                    <label>Email *</label>
                    <input class="form-control form-control_with-border" name="email" data-rules="required|valid_email">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col form-group">
                    <label>Password *</label>
                    <input class="form-control form-control_with-border" name="password" type="password" data-rules="required">
                  </div>
                  <div class="col form-group">
                    <label>Confirm Password *</label>
                    <input class="form-control form-control_with-border" name="password_confirmation" type="password" data-rules="required|matches[password]"  data-display="confirm password">
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn_primary register__submit" type="button" data-to-step="2">Next Step</button>
                </div>
              </div>
            </div>
            <div class="register__step-pane" data-step="2">
              <div class="register__registering-as">
                <div class="register__registering-as-inner">
                  You are registering as a
                  <b data-registering-as>Producer</b>
                </div>
              </div>
              <div class="registe__form">
                <div class="form-row">
                  <div class="col form-group">
                    <label>Country</label>
                    {{ Form::select('country', $countries, '', [ 'data-class-names-container-outer' => 'choices choices_with-border', 'data-search-enabled'
                    => 'true', 'data-choices', 'id' => 'register-form-country']) }}
                  </div>
                  <div class="col form-group">
                    <label>City</label>
                    {{ Form::select('city', [], '', [ 'placeholder' => 'Select country first', 'data-class-names-container-outer' => 'choices
                    choices_with-border', 'data-search-enabled' => 'true', 'data-choices', 'id' => 'register-form-city']) }}
                  </div>
                </div>
                <div class="form-row">
                  <div class="col form-group">
                    <label>Company</label>
                    <input class="form-control form-control_with-border" name="company">
                  </div>
                  <div class="col form-group">
                    <label>IMDB link</label>
                    <input class="form-control form-control_with-border" name="imdb_link">
                  </div>
                </div>
                <div class="register__terms form-group">
                  <label class="checkbox">
                    <input type="checkbox" name="terms" data-rules="!callback_check_terms">
                    <div class="checkbox__indicator"></div>
                    <div class="checkbox__label">I have read and agree with the
                      <a href="/Terms Of Use.pdf" class="link" target="_blank">"Terms & Conditions"</a>
                    </div>
                  </label>
                </div>
                <div class="form-row">
                  <div class="col text-right">
                    <button class="btn btn_outline-primary register__submit" type="button" data-to-step="1">Previous Step</button>
                  </div>
                  <div class="col">
                    <button class="btn btn_primary register__submit" type="submit">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="register__right">
          <div class="register__socials-text">Register via social networks as a:</div>
          <div class="register__socials-tabs">
            <a class="tab-link tab-link_sm active" href="#producer">Producer</a>
            {{--
            <a class="tab-link tab-link_sm" href="#financier">Financier</a>
            <a class="tab-link tab-link_sm" href="#distributor">Distributor</a> --}}
          </div>
          <div class="register__socials-btns">
            <a class="btn btn_primary btn_social btn_block" href="{{ route('f.auth.social', ['provider' => 'facebook']) }}">
              <i class="fa fa-facebook-square"></i>Register via Facebook</a>
            <a class="btn btn_primary btn_social btn_block" href="{{ route('f.auth.social', ['provider' => 'twitter']) }}">
              <i class="fa fa-twitter"></i>Register via Twitter</a>
            <a class="btn btn_primary btn_social btn_block" href="{{ route('f.auth.social', ['provider' => 'google']) }}">
              <i class="fa fa-google"></i>Register via Gmail</a>
            <a class="btn btn_primary btn_social btn_block" href="{{ route('f.auth.social', ['provider' => 'linkedin']) }}">
              <i class="fa fa-linkedin-square"></i>Register via LinkedIn</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
