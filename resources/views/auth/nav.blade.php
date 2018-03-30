@auth
  <a class="nav__link auth-link" href="{{ route('f.profile') }}">Profile</a>
  <a class="nav__link auth-link last-child" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a class="nav__link auth-link hidden" href="{{ route('f.auth') }}">Login</a>
  <a class="nav__link auth-link hidden last-child" href="{{ route('f.auth.register') }}">Register</a>
@else
  <a class="nav__link auth-link hidden" href="{{ route('f.profile') }}">Profile</a>
  <a class="nav__link auth-link hidden last-child" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <a class="nav__link auth-link" href="{{ route('f.auth') }}">Login</a>
  <a class="nav__link auth-link last-child" href="{{ route('f.auth.register') }}">Register</a>
@endauth
