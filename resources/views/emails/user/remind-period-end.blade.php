@component('mail::message')

@component('mail::panel')
Dear {{ $user->firstname }},
<br/>
We inform you that in {{ $endsFor }} days the period ends.
<br/>
Yours, {{ config('app.name') }}
@endcomponent

@endcomponent