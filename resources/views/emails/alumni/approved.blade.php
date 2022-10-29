@component('mail::message')
# Hello {{ $alumni->name }}

Your request for alumni registration has been approved. You can see your info by clicking the button below.

@component('mail::button', ['url' => route('alumni-list',"table[search]={$alumni->nick_name}")])
See my info
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
