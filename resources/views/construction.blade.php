@extends('layouts.app')

@section('header_css')
  <link href="/css/dashboard.css" rel="stylesheet"></head>
  @yield('custom_css')
@stop

@section('footer_js')
  <script type="text/javascript" src="/js/dashboard.bundle.js"></script></body>
  @yield('custom_js')
@stop

@section('content')
  <div class="dashboard">
    <aside class="dashboard-sidebar"><a class="dashboard-sidebar__top" href="/">
        <div class="dashboard-sidebar__top-logo"> </div>
        <div class="dashboard-sidebar__top-line"></div>
        <div class="dashboard-sidebar__top-descr">
          <p>OiOi.guru </p>
          <p>{{ ucfirst($role) }}</p>
        </div></a>
      <div class="dashboard-sidebar__person">
        <img class="dashboard-sidebar__person-img img-responsive" src="/{{ $user->image }}" alt="Your image here">
        <div class="dashboard-sidebar__name">{{ $user->firstname }} {{ $user->lastname }}</div>
        <div class="dashboard-sidebar__tel">{{ $user->phone }}</div>
      </div>
      <div class="dashboard-sidebar__bottom">
        <div class="dashboard-sidebar__time-title">cycle is closing in<i class="icon_info"></i></div>
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
        <button class="btn btn-dashboard-sidebar__logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-logout"> </i><span>Log Out   </span></button>
        <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
    </aside>
    @yield('main_container')

  </div>
  @yield('modals')
@stop
