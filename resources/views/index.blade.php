@extends('layouts.app')

@section('title', 'OiOi.guru')

@section('header_css')
<link href="/css/index.css" rel="stylesheet"></head>
@stop

@section('footer_js')
<script type="text/javascript" src="/js/index.bundle.js"></script></body>
<script>
$(function() {
  $('a.btn_social').on('click', function(e) {
    var href = $(this).attr('href'),
    qid = $('input#lqid').val();
    $(this).attr('href', href + '/?qid=' + qid);
  });
  $(window).on('load', function(){
    $('.preloader').fadeOut();
  })
});
</script>
@stop

@section('content')
<div class="navbar navbar--not-top navbar--unpinned">
  <a class="logo navbar__logo" href="/"></a>
  <nav class="nav navbar__nav">
    <a class="nav__link" href="#what-i-am" data-menuanchor="what-i-am">What I am</a>
    <a class="nav__link" href="#how-i-work" data-menuanchor="how-i-work">How I work</a>
    <a class="nav__link" href="#benefits" data-menuanchor="benefits">Benefits</a>
    <a class="nav__link" href="#faq" data-menuanchor="faq">Faq</a>
    <a class="nav__link" href="#contact" data-menuanchor="contact">Contact</a>
    <i class="nav__divider"></i>

    @include('auth.nav')

  </nav>
</div>
<style>
body{
  overflow: hidden;
}
.preloader{
  width: 100%;
  height:100%;
  position: fixed;
  left:0;
  top:0;
  z-index:999;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
}
</style>
<div class="preloader">Loading...</div>
<div id="fullpage">

  @include('home.header')

  @include('home.what-i-am')

  @include('home.how-i-work')

  @include('home.benefits')

  @include('home.faq')

  <section class="contact section">
    <div class="section-header">
      <h2 class="section-header__title">Contact</h2>
      <p class="section-header__lead">Get in touch with us</p>
    </div>

    @include('forms.contact')

    <div class="contact__bg"></div>
  </section>

  @include('home.footer')

</div>

@include('home.modals')

@stop
