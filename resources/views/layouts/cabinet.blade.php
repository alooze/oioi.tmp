@extends('layouts.app')

@section('header_css')
  <link href="/css/dashboard.css" rel="stylesheet">
  @yield('custom_css')
@stop

@section('footer_js')

  <script type="text/javascript" src="/js/dashboard.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.fa-close, .js-remove-img').on('click', function() {
        $(this).parents('.dashboard__info-file').find('input.file_placeholder').val('');
        $(this).parents('.dashboard-content__steps').find('input.file_placeholder').val('');
      });

    });
  </script>
  @yield('custom_js')
@stop

@section('content')
  <div class="dashboard">
    <aside class="dashboard-sidebar">
      <a class="dashboard-sidebar__top" href="/">
        <div class="dashboard-sidebar__top-logo"></div>
        <div class="dashboard-sidebar__top-line"></div>
        <div class="dashboard-sidebar__top-descr">
          <p>OiOi.guru</p>
          <p>{{ ucfirst($role) }}</p>
        </div>
      </a>

      <div class="dashboard-sidebar__person">
        @if($user->image)
          <img class="dashboard-sidebar__person-img img-responsive" src="/{{ $user->image }}" alt="Your image here">
        @else
          <div class="dashboard-sidebar__person-img-placeholder">
            <i class="fa fa-user"></i>
            <span>Your image</span>
          </div>
        @endif
        <div class="dashboard-sidebar__name">{{ $user->firstname }} {{ $user->lastname }}</div>
        <div class="dashboard-sidebar__tel">{{ $user->phone }}</div>
      </div>
      <ul class="dashboard-sidebar__menu">
        <li>
          <a class="{{ ('f.films' === $active || 'f.films.edit' === $active || 'f.films.update' === $active) ? 'active' : '' }}" href="{{ route('f.films') }}">
            <i class="cinema-icon"></i> <span>My Films</span>
          </a>
        </li>
        <li>
          <a class="{{ ('f.profile' == $active) ? 'active' : '' }}" href="{{ route('f.profile') }}">
            <i class="user-icon"></i> <span>My Profile</span>
          </a>
        </li>
      </ul>

      <a href="{{ route('f.films.add', 'general') }}" class="btn btn-dashboard-sidebar__new-film">Register new film</a>

      <div class="dashboard-sidebar__bottom">
        <div class="dashboard-sidebar__time-title">
          Submission period<br/>expires in
          <i class="icon_info" data-tippy-html="#cycle-tooltip" data-tippy-prevent-overflow-disabled></i>
        </div>
        <ul class="dashboard-sidebar__timer" id="countdown">
          <li>
            <div class="dashboard-sidebar-timer__num days">{{ $endPeriod->d }}</div>
            <div class="dashboard-sidebar-timer__label">days</div>
          </li>
          <li>
            <div class="dashboard-sidebar-timer__num hours">{{ $endPeriod->h }}</div>
            <div class="dashboard-sidebar-timer__label">hours</div>
          </li>
          <li>
            <div class="dashboard-sidebar-timer__num minutes">{{ $endPeriod->m }}</div>
            <div class="dashboard-sidebar-timer__label">min</div>
          </li>
          <li>
            <div class="dashboard-sidebar-timer__num seconds">{{ $endPeriod->s }}</div>
            <div class="dashboard-sidebar-timer__label">sec</div>
          </li>
        </ul>

        <button class="btn btn-dashboard-sidebar__logout" onclick="document.getElementById('logout-form').submit();">
          <i class="icon-logout"></i> <span>Log Out</span>
        </button>
      </div>
    </aside>

    @yield('main_container')

  </div>

  @yield('modals')

  @yield('tooltips')

  <template id="cycle-tooltip">
    <p class="tooltip-title">Submission deadline</p>
    <p class="tooltip-text">Submission deadline is the date, while we register producers' applications and then, we submit the AI estimations and shortlist to the stakeholders.</p>
    <a class="tooltip-link" href="/#faq">Find out more in FAQ</a>
    <button class="tooltip-close">
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </button>
  </template>
@stop
