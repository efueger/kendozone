<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ trans('mail.invite') }}</title>
</head>
<?php
$appURL = (app()->environment()=='local' ? getenv('URL_BASE') : config('app.url'));
?>
<body>
<h2>{{ trans('mail.invite_to_tournament') }}: {{ $tournament->name }} </h2>

<p>{{ trans('mail.dear_kenshi') }}<br/>

    {{ trans('mail.you_are_invited_to_tournament') }}: {{ $tournament->name }} <BR/>

    @if ($tournament->venue != null)
        <strong>{{trans('core.venue')}}:</strong> {{ $tournament->venue }}<br/>
    @endif
    <strong>{{trans('core.date')}}:</strong> {{ $tournament->date }}<br/>
    @if ($tournament->cost != null) <strong>{{trans('core.cost')}}:</strong> {{ $tournament->cost }}<br/>@endif
    @if ($tournament->registerDateLimit != null && $tournament->registerDateLimit!= '0000-00-00')
        <strong>{{trans('core.limitDateRegistration')}}:</strong> {{ $tournament->registerDateLimit }}<br/>
    @endif
@if (isset($category))
    <P>{{ trans('mail.you_have_been_preregistered') }}</P>
    <ul>
            <li>{{$category}}</li>
    </ul>
@else
    {{trans('mail.please_clic_confirmation_link')}}: <br/>
    <a href='{{$appURL}}/tournaments/{{$tournament->slug}}/invite/{{ $code }}'>{{$appURL}}/tournaments/{{$tournament->slug}}/invite/{{ $code }}</a>
@endif
{{--TODO Falta traducir--}}
@if($password!=null)
    <p>Tus datos de conexión son:</p>
    Usuario : {{ $email  }}
    Contraseña: {{ $password }}
@endif

<p>No olvides que se tienen que cubrir las cuotas respectivas a cada categoria para aplicar al sorteo
    @if ($tournament->registerDateLimit != null && $tournament->registerDateLimit!= '0000-00-00')
        antes del dia {{ $tournament->registerDateLimit }}.</p>
    @endif

<p>Gracias</p>

<p align="right">{{ $tournament->owner->name  }}</p>
</body>
</html>