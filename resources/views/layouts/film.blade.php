@extends('layouts.cabinet')

@section('title', $title)

@section('custom_css')
  <style>
    .invalid-feedback {
      font-size: 11px;
    }
  </style>
@stop

@section('custom_js')
  @if ($saved)
    <script>
    if(document.querySelector('button[type="submit"]').innerText == 'SAVE') document.querySelector('button[type="submit"]').innerText = 'SAVED';

      showNotif('Information saved')
    </script>
  @endif

  <script>
    $(document).ready(function() {
      $('.btn-edit').on('click', function() {
        $('input[name="pid"][type="hidden"]').val($(this).data('pid'));
      });
    });
  </script>
@stop

@section('main_container')
  <div class="dashboard-content">
    <h1 class="dashboard-title">{{ $title }}</h1>
    <div class="dashboard-content__inner">
      <div class="dashboard-content__inner-nxt">
        <div class="dashboard-content__steps">
          <h2 class="dashboard__steps-title">Steps</h2>
          <ul class="dashboard__steps-list">
            @foreach ($film->getStepList($step) as $key => $S)
              <a style="text-decoration:none;" href="{{ $S['href'] }}">
                <li class="{{ $S['class'] }} ">{{ $S['title'] }}</li>
              </a>
            @endforeach
          </ul>
        </div>
        <div class="dashboard-content__info">
          <h2 class="dashboard__info-title">{{ $film->stepTitle($step) }}</h2>
          @yield('block_content')
        </div>
      </div>
    </div>
  </div>
@stop
