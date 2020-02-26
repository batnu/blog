@component('mail::message')
# El usuario {{ $user->name }} ha creado un nuevo post

@component('mail::table')
    | Username | Contraseña |
    |:--------|:----------|
    | {{ $post->name }} | {{ $post->excerpt }}
@endcomponent

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Un saludo,<br>
{{ config('app.name') }}
@endcomponent

