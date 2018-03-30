<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/favicon.ico?" type="image/x-icon">
  <title>@yield('title')</title>
  @yield('header_css')
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112394321-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112394321-1');
  </script>
</head>
<body>
  <div class="mobile-extends">
    <div class="mobile-extends__inner">
      <div>
        <a href="/" class="mobile-extends__logo"></a>
      </div>
      <div>
        <div class="mobile-extends__main">
          <div  class="mobile-extends__laptop"></div>
          <h2 class="mobile-extends__title">Dear User</h2>
          <p class="mobile-extends__descr">OiOi.guru’s mobile version is still in development. Please, use our platform from your desktop devices.</p>
        </div>
        <div class="mobile-extends__footer">
          <p>Yours, OiOi.guru</p>
        </div>
      </div>
    </div>
  </div>

@if (!app('mobile-detect')->isMobile() || app('mobile-detect')->isTablet())

  @yield('content')

  <div class="add-bug" id="add-bug"> <!-- add success class when form sent -->
    <div class="add-bug-modal">
      <div class="add-bug-sent">
        <p><strong>Thank you!</strong></p>
        <p>Your message is received</p>
      </div>
      {{
        Form::open([
        'url' => route('f.bug'),
        'method' => 'post',
        'class' => 'add-bug-form',
        'id' => 'add-bug-form',
        'data-form-validate' => ''
        ])
      }}
      {{ Form::hidden('form_id', '2') }}
      @if ( !isset($user) || !$user )
      {{ Form::hidden('who', '-') }}
      {{ Form::hidden('name', '-') }}
      {{ Form::hidden('email', '-') }}
      @else
      {{ Form::hidden('who', ucfirst($user->role)) }}
      {{ Form::hidden('name', $user->firstname . ' ' . $user->lastname) }}
      {{ Form::hidden('email', $user->email) }}
      @endif
      <div class="form-group">
        <label>Found a bug?</label>
        <textarea name="message" placeholder="Tell us about it..." rows="7" data-rules="required"></textarea>
      </div>
      <button class="btn btn-primary">Send message</button>
      {{ Form::close() }}
    </div>
    <div class="add-bug-toggler"></div>
  </div>
  @yield('footer_js')

  <form id="logout-form" action="{{ route('f.auth.logout') }}" method="post">
    {{ csrf_field() }}
  </form>

@endif

</body>
</html>
