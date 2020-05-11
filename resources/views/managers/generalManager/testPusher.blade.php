@extends('managers.layout')

@section('content')
    <main class="text-center">
    <h1 class="text-primary">Pusher Test</h1>
    <p>
        Intenta publicar un evento en el canal <code>Test 1StepService</code>
        con nombre del evento <code>mi-evento</code>.
    </p>

    <ul id="myList">
        <li>Primer mensaje</li>
    </ul>
    </main>
@endsection