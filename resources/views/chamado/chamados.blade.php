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
            <table class="table table-striped table-hover caption-top w-100">
                <thead class="table-light">
                    <tr>
                        <th class="col fw-bold">#</th>
                        <th class="col fw-bold">Titulo</th>
                        <th class="col fw-bold">Prioridade</th>
                        <th class="col fw-bold text-center">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($chamados as $chamadosId => $chamado)
                    <tr class="w-100" onclick="window.location='{{route('chamado.show', ['id' => $chamado['id']])}}'">
                        <td class="fw-bold" style="width: 5%;">{{ $chamado['id'] }}</td>
                        <td class="" style="width: 80%;">{{ $chamado['titulo'] }}</td>
                        @if ($chamado['prioridade_id'] == 1)
                            <td class="" style="width: 10%; background-color: green; color: #fff;">{{ ucfirst($chamado['prioridade']) }}</td>
                        @elseif ($chamado['prioridade_id'] == 2)
                            <td class="" style="width: 10%; background-color: blue; color: #fff;">{{ ucfirst($chamado['prioridade']) }}</td>
                        @elseif ($chamado['prioridade_id'] == 3)
                            <td class="" style="width: 10%; background-color: orange; color: #fff;">{{ ucfirst($chamado['prioridade']) }}</td>
                        @elseif ($chamado['prioridade_id'] == 4)
                            <td class="" style="width: 10%; background-color: red; color: #fff;">{{ ucfirst($chamado['prioridade']) }}</td>
                        @endif
                        <td class="text-center mx-3" style="width: 5%;"><a class="list-group-item-remove" href="{{ route('chamado.destroy', ['id' => $chamado['id']]) }}"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="table-danger alert alert-danger text-center" role="alert">
                            Não existem chamados cadastrados!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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
