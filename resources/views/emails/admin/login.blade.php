@component('mail::message')
# Hello {{ $user->name }},

Your login details below.

Email : {{ $user->email }}


Password : {{ $user->password }}

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
