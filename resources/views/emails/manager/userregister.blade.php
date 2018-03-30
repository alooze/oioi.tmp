@component('mail::message')
New user registered.

@component('mail::panel')
  <ul>
    <li>
        <b>First name:</b> {{ $user->firstname }}
    </li> 
    <li>
        <b>Last name:</b> {{ $user->lastname }}
    </li> 
    <li>
        <b>Email:</b> {{ $user->email }}
    </li>
    <li>
        <b>Phone:</b> {{ $user->phone }}
    </li>
    <li>
        <b>Company:</b> {{ $user->company }}
    </li>
    <li>
        <b>City:</b> {{ $user->city }}
    </li>
    <li>
        <b>Country:</b> {{ $user->country }}
    </li>
    
  </ul>
@endcomponent

@component('mail::button', ['url' => route('f.start')])
View site
@endcomponent

Yours, {{ config('app.name') }}
@endcomponent
