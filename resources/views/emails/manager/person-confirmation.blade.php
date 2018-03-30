@component('mail::message')
Film person confirmation.

@component('mail::panel')
  <div>
    <p>
      <b>{{ $person->firstname }} {{ $person->lastname }} <{{ $person->email }}></b> confirmed himself(herself) as {{ ucfirst($person->role) }} for film titled <b>{{ $person->film->title }}</b>
    </p>
  </div>
@endcomponent

@component('mail::button', ['url' => route('f.start')])
View site
@endcomponent

Yours, {{ config('app.name') }}
@endcomponent
