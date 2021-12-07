@component('mail::message')
# Tus Credenciales para acceder a {{ config('app.name') }}

Hola {{ $user->name }} utiliza las siguientes credenciales para acceder a tu cuenta

@component('mail::table')
    | Username | Password |
    |:----------|:----------|
    |{{ $user->email }}|{{ $password }}|
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
