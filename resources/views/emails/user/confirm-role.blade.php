@component('mail::message')

@component('mail::panel')
  <div>
    <p>
      Dear {{ $data['firstname'] }},
      <br/>
      {{ $person->firstname }} {{ $person->lastname }} registered you as a {{ ucfirst($data['role']) }} for the new project{!! $film->title ? ' titled "<b>' . $film->title . '</b>"' : '-'!!}. Please confirm that this information is correct by clicking the link below:
    </p>
    @component('mail::button', [
      'url' => route('f.confirm-role', $data['confirm_code']) . '?from=' . $data['email']
      ])
    Confirm link
    @endcomponent
    <p>
      <br/>
      Should this be a mistake, please send us email to team@oioi.guru
      <br/>
      Thank you,
      <br/>
      The {{ config('app.name') }} team
    </p>
@endcomponent

@endcomponent
