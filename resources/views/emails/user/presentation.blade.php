@component('mail::message')
# Добрый день

@component('mail::panel')
Вы просили выслать вам презентацию. С удовольствием выполняем вашу просьбу.
@endcomponent

@component('mail::button', ['url' => route('f.start')])
Перейти на сайт
@endcomponent

Хорошего дня,<br>
{{ config('app.name') }}
@endcomponent
