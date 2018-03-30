@extends('construction')

@section('custom_css')

@stop

@section('main_container')
  <div class="dashboard-content flex-align-center">
      <div class="dashboard-is-submit modal-content modal-content--secondary ">
          <h1 class="modal-title modal-title--secondary">Oops!</h1>
          <p class="modal-descr">Cabinet for <b>{{ $role }}s</b> is under construction.<br/>Comming soon.</p>
          <a class="btn btn-primary btn-primary--submit" href="{{ route('f.start') }}">Start page</a>
      </div>
  </div>
@stop
