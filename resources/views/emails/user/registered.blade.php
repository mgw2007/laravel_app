@component('mail::message')
<h3>Welcome</h3>
You can login using email: {{$user->email}}
@if(isset($user->planPassword))
with password: {{$user->planPassword}}
@endif
<br />
<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
<br />
<br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent
