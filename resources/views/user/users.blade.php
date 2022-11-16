@extends('layout.layout')
@section('title', 'Usuarios')

@section('content')
    <div class="content">
        <div class="content_header">
            <a href="{{ route('usuario.create') }}" class="content_header_button">
                <i class="fa-solid fa-plus"></i>
                Novo
            </a>
            <a href="#" class="content_header_button-second">
                <i class="fa-solid fa-filter"></i>
            </a>
        </div>

        <div class="content_results overflow-auto">
            <ul class="list-group w-100">
                @forelse ($users as $userId => $user)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $user['name'] }}</span>
                        <span>{{ $user['email'] }}</span>

                        <a href="{{ route('user.remove', ['id' => $user['id']]) }}"><i class="fa-solid fa-trash"></i></a>
                    </li>
                @empty
                <div class="alert alert-danger" role="alert">
                    Não existem usuarios cadastrados!
                </div>
                @endforelse
            </ul>
        </div>

        <div class="content_footer">
            @if ($users->onFirstPage())
            <i class="fa-solid fa-arrow-left"></i>
            @else
            <a href="{{ $users->previousPageUrl() }}"><i class="fa-solid fa-arrow-left"></i></a>
            @endif

            <span>{{ $users->currentPage() }} de {{ $users->lastPage() }}</span>

            @if ($users->onLastPage())
            <i class="fa-solid fa-arrow-right"></i>
            @else
            <a href="{{ $users->nextPageUrl() }}"><i class="fa-solid fa-arrow-right"></i></a>
            @endif
        </div>
    </div>

@endsection
