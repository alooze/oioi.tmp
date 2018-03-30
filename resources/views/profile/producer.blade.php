@extends('layouts.cabinet')

@section('title', $title)

@section('custom_css')

@stop

@section('custom_js')

@stop

@section('main_container')
  <div class="dashboard-content">
    <h1 class="dashboard-title">{{ $title }}</h1>
    @if ($saved)
      <div class="info-saved">
        <p class="info-saved__descr"><i class="icon-checked"></i>Information saved</p>
        <div class="info-close">
          <svg width="12" height="12" viewBox="0 0 13.25 13.25">
            <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
            <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
          </svg>
        </div>
      </div>
    @endif
    <div class="dashboard-content__inner dashboard-content__inner--profile">
      <form class="dashboard-content__inner-nxt" action="{{ route('f.profile.update') }}" id="general-info" method="post" enctype="multipart/form-data" data-form-validate>
        {{ csrf_field() }}
        {{ Form::hidden('block', 'general') }}
        <div class="dashboard-content__steps dashboard-content__steps--profile">
        {{ Form::hidden('image', $user->image, ['class'=>'file_placeholder']) }}
        @if ($user->image != null)
          <div class="dropzone dashboard__info-file  dashboard__info-file--profile active" id="user-avatar-uploader">
            <div class="form__file-previews js-img-preview">
        @else
          <div class="dropzone dashboard__info-file  dashboard__info-file--profile" id="user-avatar-uploader">
            <div class="form__file-previews js-img-preview" hidden>
        @endif
              <img class="dashboard-sidebar__person-img img-responsive" src="/{{ $user->image }}">
              <div class="btn-img-change-wrap">
                <button type="button" class="btn btn-img-change btn-reload js-reload-img"></button>
                <button type="button" class="btn  btn-img-change btn-close js-remove-img"></button>
              </div>
            </div>
            <span class="dashboard__info-file__img-thumbnail">Your image</span>
            <span>Drag here, or</span>
            <input type="file" name="image_input" accept="image/jpeg,image/png" id="input-thumbnail">
            <label for="input-thumbnail" class="block">upload</label>
            <p class="form__file-descr">Min size 320x320 px JPEG / PNG</p>
          </div>
        </div>

        <div class="dashboard-content__info dashboard-content__info--profile">
          <h2 class="dashboard__info-title dashboard__info-title--secondary">General Info</h2>
          <div class="dashboard__info-form__inner dashboard__info-form__inner--profile">
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
              <p class="dashboard__info-form-descr">First name *</p>
              {{ Form::text('firstname', $user->firstname, ['data-rules' => 'required', 'autocomplete' => 'off']) }}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
              <p class="dashboard__info-form-descr">Last name *</p>
              {{ Form::text('lastname', $user->lastname, ['data-rules' => 'required', 'autocomplete' => 'off']) }}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
              <p class="dashboard__info-form-descr">Country</p>
              {{ Form::select('country', $countries, ($user->country) ?: '', [
                'id' => 'general-info-country',
                'placeholder' => 'Choose country',
                'data-class-names-container-outer' => 'choices choices_with-border',
                'data-search-enabled' => 'true',
                'data-choices',
              ]) }}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
              <p class="dashboard__info-form-descr">City</p>
              {{ Form::select('city', $cities, ($user->city) ?: '', [
                'id' => 'general-info-city',
                'placeholder' => 'Choose country first',
                'data-class-names-container-outer' => 'choices choices_with-border',
                'data-search-enabled' => 'true',
                'data-choices',
              ]) }}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
              <p class="dashboard__info-form-descr">Company</p>
              {{ Form::text('company', $user->company, ['autocomplete' => 'off']) }}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
              <p class="dashboard__info-form-descr">IMDB link</p>
              {{ Form::text('imdb_link', $user->imdb_link, ['autocomplete' => 'off']) }}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full dashboard__info-form-wrap--h-line">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
        </div>
      </form>
      <form class="dashboard-content__inner-nxt" action="{{ route('f.profile.update') }}" id="contact-details" method="post" data-form-validate>
        {{ csrf_field() }}
        {{ Form::hidden('block', 'contact') }}
        <div class="dashboard-content__steps dashboard-content__steps--profile"></div>
        <div class="dashboard-content__info dashboard-content__info--profile">
          <h2 class="dashboard__info-title dashboard__info-title--secondary">Contact Details</h2>
          <div class="dashboard__info-form__inner  dashboard__info-form__inner--profile">
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
              <p class="dashboard__info-form-descr">Email *</p>
              @if ($user->soc_id == null)
                {{ Form::email('email', $user->email, ['data-rules' => 'required|valid_email', 'autocomplete' => 'off']) }}
              @else
                {{ Form::email('', $user->email, ['disabled']) }}
              @endif
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
              <p class="dashboard__info-form-descr">Mobile number *</p>
              {{-- <div class="number-fieldset"> --}}
                {{ Form::text('phone', $user->phone, ['data-rules' => 'required|numeric', 'autocomplete' => 'off']) }}
              {{-- </div> --}}
            </div>
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full dashboard__info-form-wrap--h-line">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
        </div>
      </form>
      @if ($user->soc_id == null)
        <form class="dashboard-content__inner-nxt" action="{{ route('f.profile.update') }}" id="change-password" method="post" data-form-validate>
          {{ csrf_field() }}
          {{ Form::hidden('block', 'password') }}
          <div class="dashboard-content__steps dashboard-content__steps--profile"></div>
          <div class="dashboard-content__info dashboard-content__info--profile">
            <h2 class="dashboard__info-title dashboard__info-title--secondary">Change Password</h2>
            <div class="dashboard__info-form__inner  dashboard__info-form__inner--profile">
              <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
                <p class="dashboard__info-form-descr">Current password *</p>
                {{ Form::password('password', ['data-rules' => 'required']) }}
              </div>
              <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
                <p class="dashboard__info-form-descr">New password *</p>
                {{ Form::password('passnew', ['data-rules' => 'required', 'data-display' => 'new password']) }}
              </div>
              <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
                <p class="dashboard__info-form-descr">Repeat new password *</p>
                {{ Form::password('passnew_confirmation', ['data-rules' => 'required', 'data-display' => 'repeat new password']) }}
              </div>
              <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
          </div>
        </form>
      @endif
    </div>
  </div>
@stop
