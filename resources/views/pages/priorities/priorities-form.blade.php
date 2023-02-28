@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => empty($priority) ? 'Criar Prioridade' : 'Editar Prioridade',
    ])
    <div class="row mt-4 mx-4">
        <div class="card mb-4">
            <div class="row card-header pb-0">
                <div class="col-4 col-md-2">
                    <a href="{{ route('priorities') }}" class="btn btn-icon btn-3 btn-secondary w-100 mb-0">
                        <span class="btn-inner--icon"><i class="fa-solid fa-caret-left" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Voltar</span>
                    </a>
                </div>
                <div class="col-4 col-md-8"></div>
                <div class="col-4 col-md-2">
                    <button onclick="document.getElementById('newPriorityForm').submit();"
                        class="btn btn-icon btn-3 btn-primary w-100 mb-0">
                        <span class="btn-inner--icon"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Salvar</span>
                    </button>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">

                <div id="alert">
                    @include('components.alert')
                </div>

                <p class="text-uppercase text-sm text-center mt-1 mb-3">
                    {{ empty($call) ? 'Nova Prioridade' : 'Editar Prioridade' }}</p>
                <form action="{{ empty($priority) ? route('priorities.store') : route('priorities.update', ['priority' => $priority->id]) }}"
                    method="POST" enctype="multipart/form-data" id="newPriorityForm">
                    @csrf
                    @if (!empty($priority))
                        <input type="hidden" name="id" value="{{ $priority->id }}">
                    @endif
                    <div class="row px-1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" aria-label="Nome"
                                    value="{{ $priority->name ?? '' }}" required>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
