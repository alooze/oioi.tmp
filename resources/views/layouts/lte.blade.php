@extends('adminlte::page')

@section('title', 'Dashboard')

@section('custom_css')
<style type="text/css">
  tfoot {
    display: table-header-group !important;
  }
  table{
    width: 100%;
  }
  .actions{
    width: 0;
  }
  select.fil-opt {
    width: 75px;
}
</style>
@stop

@section('content_header')
@stop

@section('content')    
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/qwertcms/css/bootstrap_multiselect.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/qwertcms/bootstrap_datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('vendor/qwertcms/js/bootbox.min.js') }}"></script>
    <script src="{{ asset('vendor/qwertcms/js/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('vendor/qwertcms/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script src="{{ asset('vendor/qwertcms/js/custom.js') }}"></script>
    @yield('custom_js')
@stop