@component('mail::message')
New message from {{ $usedForm->name }}.

@component('mail::panel')
<div>
@foreach ($formData as $fld => $val)
@if ($fld == 'form_id')
@elseif ($fld == 'name')
<p>Name: {{ $val }}</p>
@elseif ($fld == 'phone')
<p>Phone: {{ $val }}</p>
@elseif ($fld == 'email')
<p>Email: {{ $val }}</p>
@endif
@endforeach
</div>
@endcomponent

@component('mail::button', ['url' => route('f.start')])
View site
@endcomponent

Yours, {{ config('app.name') }}
@endcomponent
