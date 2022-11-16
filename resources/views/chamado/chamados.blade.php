@extends('layout.layout')
@section('title', 'Chamados')

@section('content')
    <div class="content">
        <div class="content_header">
            <a href="{{ route('chamado.create') }}" class="content_header_button">
                <i class="fa-solid fa-plus"></i>
                Novo
            </a>
            <a href="#" class="content_header_button-second">
                <i class="fa-solid fa-filter"></i>
            </a>
        </div>

        <div class="content_results">
            <ul class="list-group w-100">
                @forelse ($chamados as $chamadosId => $chamado)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $chamado['id'] }}</span>
                        <span>{{ $chamado['titulo'] }}</span>

                        <a class="list-group-item-remove" href="{{ route('chamado.destroy', ['id' => $chamado['id']]) }}"><i class="fa-solid fa-trash"></i></a>
                    </li>
                @empty
                <div class="alert alert-danger" role="alert">
                    Não existem chamados cadastrados!
                </div>
                @endforelse
            </ul>
        </div>

        <div class="content_footer">
            @if ($chamados->onFirstPage())
            <i class="fa-solid fa-arrow-left"></i>
            @else
            <a href="{{ $chamados->previousPageUrl() }}"><i class="fa-solid fa-arrow-left"></i></a>
            @endif

            <span>{{ $chamados->currentPage() }} de {{ $chamados->lastPage() }}</span>

            @if ($chamados->onLastPage())
            <i class="fa-solid fa-arrow-right"></i>
            @else
            <a href="{{ $chamados->nextPageUrl() }}"><i class="fa-solid fa-arrow-right"></i></a>
            @endif
        </div>
    </div>

@endsection
