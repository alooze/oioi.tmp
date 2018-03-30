{{
  Form::open([
    'url' => route('f.auth.login'),
    'method' => 'post',
    'class' => 'login tab-pane',
    'id' => 'comment-login-form',
    'data-form-validate' => '',
  ])
}}
{{ Form::hidden('qid', '', ['id' => 'lqid']) }}
<!-- <form class="login tab-pane" action="http://httpbin.org/post" method="POST" data-form-validate id="comment-login-form"> -->
  <div class="login__title">Login</div>
  <div class="login__content">
    <div class="login__local">
      <div class="form-group">
        <label>Email</label>
        <input class="form-control form-control_with-border" name="email" data-rules="required">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control form-control_with-border" type="password" name="password" data-rules="required">
      </div>
      <button class="btn btn_primary btn_block" type="submit" onclick="document.getElementById('qid').value = document.getElementById('gqid').value;">Log In</button>
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
        <!-- <a class="btn btn_primary btn_social" href="#"><i class="fa fa-facebook-square"></i><br>Facebook</a><a class="btn btn_primary btn_social" href="#"><i class="fa fa-twitter"></i><br>Twitter</a><a class="btn btn_primary btn_social" href="#"><i class="fa fa-google"></i><br>Gmail</a><a class="btn btn_primary btn_social" href="#"><i class="fa fa-linkedin-square"></i><br>LinkedIn</a> -->
      </div>
    </div>
  </div>
{{ Form::close() }}
