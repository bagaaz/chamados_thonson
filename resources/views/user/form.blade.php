@extends('layout.layout')
@section('title', 'Usuarios')

@section('content')
    <div class="content">
        <div class="content_header">
            <a href="{{ route('user.create') }}" class="content_header_button">
                <i class="fa-solid fa-plus"></i>
                Novo
            </a>
            <a href="#" class="content_header_button-second">
                <i class="fa-solid fa-filter"></i>
            </a>
        </div>

        <div class="content_results">
            <form action="{{ route('user.create') }}" method="post">
                <label for="name">Nome Completo:</label>
                <input type="text" name="name" id="name">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email">

                <label for="password">Senha:</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>

@endsection
