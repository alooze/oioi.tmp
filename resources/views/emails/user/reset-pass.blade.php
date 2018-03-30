@component('mail::message')

  @component('mail::panel')
    Dear {{ $user->firstname }},
    <br/>
    You've attempted password reseting on OiOi.guru
    <br/>
    Your account was registered via the {{ ucfirst($user->soc_provider) }} credentials.
    <br/>
    You can't change password for this account.
    <br/>
    <br/>
    Yours, {{ config('app.name') }}
  @endcomponent

@endcomponent
