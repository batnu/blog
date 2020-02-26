@component('mail::message')
# El usuario {{ $user->name }} ha creado un nuevo post

@component('mail::table')
    | Id del post | Nombre del post |
    |:--------|:----------|
    | {{ $post->id }} | {{ $post->title }}
@endcomponent

Un saludo,<br>
{{ config('app.name') }}
@endcomponent

