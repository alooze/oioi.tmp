@component('mail::message')
New film submit.

@component('mail::panel')
  <div>
    <p>
      <b>{{ $user->firstname }} {{ $user->lastname }} <{{ $user->email }}></b> submitted new film</p>
  </div>
@endcomponent

@component('mail::button', ['url' => route('f.start')])
View site
@endcomponent

Yours, {{ config('app.name') }}
@endcomponent
