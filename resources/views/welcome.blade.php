@extends('layout.layout')
@section('title', 'Dashboard')

@section('content')
<div class="antialiased">
    @if (Auth::check())
        <p>O usuário logado é: <strong>{{ Auth::user()->name }}</strong></p>
        @switch(Auth::user()->type_access)
            @case(0)
                <p>Nivel de acesso: <strong>Admin</strong></p>
                @break
            @case(1)
                <p>Nivel de acesso: <strong>Suporte</strong></p>
                @break
            @case(2)
                <p>Nivel de acesso: <strong>Solicitante</strong></p>
                @break
            @default
                <p>Nivel de acesso: <strong>Não Encontrado!</strong></p>
        @endswitch
    @endif
</div>

@endsection
