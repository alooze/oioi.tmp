@component('mail::message')
New Bug report.

@component('mail::panel')
  <div>
    @foreach ($formData as $fld => $val)
      @if ($fld == 'form_id')
      @elseif ($fld == 'who')
      <p>Role: {{ $val }}</p>
      @elseif ($fld == 'name')
      <p>Name: {{ $val }}</p>
      @elseif ($fld == 'email')
      <p>Email: {{ $val }}</p>
      @endif
    @endforeach
    <hr>
    <p>{{ $formData['message'] }}</p>
  </div>
@endcomponent

@component('mail::button', ['url' => route('f.start')])
View site
@endcomponent

Yours, {{ config('app.name') }}
@endcomponent
