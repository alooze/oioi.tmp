@component('mail::message')

  @component('mail::panel')
    <div>
      <p style="text-align:center;">
        Dear {{ $user->firstname }},
        <br/>
        I received your request. Here is a link to your profile:
        <a href="{{ route('f.profile') }}">{{ route('f.profile') }}</a>
        <br/>
      </p>
      <p>
        Within a few days I'll send you next email with preliminary feedback on your project.<br/>
        The investment cycle is closed on {{ $cycle }}. You will get the notification if you are shortlisted or not by {{ $until }}.
        <br/>
        <br/>
        Yours, {{ config('app.name') }}
      </p>
    </div>
  @endcomponent

@endcomponent
