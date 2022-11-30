@extends('layout.layout')
@section('title', 'Chamados')

@section('content')
    <div class="content py-3">
        <div class="content_header">
            <a href="{{ route('chamado.edit') }}" class="content_header_button">
                <i class="fa-regular fa-pen-to-square"></i>
                Editar
            </a>
            <a href="#" class="content_header_button-second">
                <i class="fa-solid fa-filter"></i>
            </a>
        </div>
        <div class="content_results px-3 py-5">
            <div class="row mb-5">
                <div class="col-1">
                    <div><span class="fw-bold">ID</span></div>
                    <div><span>{{$chamado['id']}}</span></div>
                </div>
                <div class="col-8">
                    <div><span class="fw-bold">Título</span></div>
                    <div><span>{{$chamado['titulo']}}</span></div>
                </div>
                <div class="col-3">
                    <div><span class="fw-bold">Prioridade</span></div>
                    <div><span>{{ucfirst($chamado['prioridade'])}}</span></div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-9">
                    <div><span class="fw-bold">Descrição</span></div>
                    <div><span>{{$chamado['descricao']}}</span></div>
                </div>
                <div class="col-3">
                    <div><span class="fw-bold">O.S.</span></div>
                    <div><span>{{$chamado['os']}}</span></div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-3">
                    <div><span class="fw-bold">Mnemônico Shift</span></div>
                    <div><span>{{$chamado['mnemonico_shift']}}</span></div>
                </div>
                <div class="col-3">
                    <div><span class="fw-bold">Mnemônico Apoio</span></div>
                    <div><span>{{$chamado['mnemonico_apoio']}}</span></div>
                </div>
                <div class="col-3">
                    <div><span class="fw-bold">Responsavel</span></div>
                    <div><span>{{$chamado['usuario_id']}}</span></div>
                </div>
                <div class="col-3">
                    <div><span class="fw-bold">Data Abertura</span></div>
                    <div><span>{{$chamado['created_at']}}</span></div>
                </div>
            </div>
        </div>
    </div>

@endsection

