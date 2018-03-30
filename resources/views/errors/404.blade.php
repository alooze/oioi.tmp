@extends('layouts.app')

@section('title', 'OiOi.guru 404')

@section('header_css')
  <link href="/css/error.css" rel="stylesheet"></head>
@stop

@section('footer_js')
  <script type="text/javascript" src="/js/error.bundle.js"></script></body>
@stop

@section('content')
        <div class='error-wrap'>
            <a href="/" class="logo"></a>
            <div class="error-inner">
            <h1 class='error-title'>404</h1>
            <h2 class="error-subtitle">Page Not Found</h2>
            <p class="error-descr">The link you followed probably broken,
        or the page has been removed</p>
            <a href="/" class="btn btn-error">Return to home page</a>
          </div>
        </div>
@stop
