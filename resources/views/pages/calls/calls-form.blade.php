@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => empty($call) ? 'Criar Chamado' : 'Editar Chamado',
    ])
    <div class="row mt-4 mx-4">
        <div class="card mb-4">
            <div class="row card-header pb-0">
                <div class="col-4 col-md-2">
                    <a href="{{ route('calls') }}" class="btn btn-icon btn-3 btn-secondary w-100 mb-0">
                        <span class="btn-inner--icon"><i class="fa-solid fa-caret-left" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Voltar</span>
                    </a>
                </div>
                <div class="col-4 col-md-8"></div>
                <div class="col-4 col-md-2">
                    <button onclick="document.getElementById('newCallForm').submit();"
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
                    {{ empty($call) ? 'Novo Chamado' : 'Editar Chamado' }}</p>
                <form action="{{ empty($call) ? route('calls.store') : route('calls.update', ['call' => $call->id]) }}"
                    method="POST" enctype="multipart/form-data" id="newCallForm">
                    @csrf
                    @if (!empty($call))
                        <input type="hidden" name="id" value="{{ $call->id }}">
                    @endif
                    <input type="hidden" name="caller_id" id="caller_id" value="{{ Auth::user()->id }}">
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title" aria-label="Título"
                                    value="{{ $call->title ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_order" class="form-control-label">O.S.</label>
                                <input type="text" class="form-control" id="service_order" name="service_order"
                                    value="{{ $call->service_order ?? '' }}" aria-label="O.S." pattern="^\d{3}-\d{5}-\d{4}$"
                                    placeholder="001-65648-0001">
                            </div>
                        </div>
                    </div>
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="local_mnemonic" class="form-control-label">Mnemônico Shift</label>
                                <input type="text" class="form-control" id="local_mnemonic" name="local_mnemonic"
                                    aria-label="Mnemônico Shift" value="{{ $call->local_mnemonic ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outside_mnemonic" class="form-control-label">Mnemônico Apoio</label>
                                <input type="text" class="form-control" id="outside_mnemonic" name="outside_mnemonic"
                                    aria-label="Mnemônico Apoio" value="{{ $call->outside_mnemonic ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="priority_id" class="form-control-label">Prioridade</label>
                                <select class="form-control" name="priority_id" id="priority_id" required>
                                    <option value="" {{ empty($call->priority_id) ? 'selected' : '' }}>Selecione uma
                                        opção...</option>
                                    @foreach ($priorities as $priority)
                                        @if (!empty($call))
                                            <option value="{{ $priority['id'] }}"
                                                {{ $call->priority_id == $priority['id'] ? 'selected' : '' }}>
                                                {{ $priority['name'] }}
                                            </option>
                                        @else
                                            <option value="{{ $priority['id'] }}">{{ $priority['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="form-control-label">Imagem</label>
                                <input type="text" class="form-control" id="image" name="image" aria-label="Imagem"
                                    value="{{ $call->image ?? '' }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row px-1">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Descrição</label>
                            <textarea class="summernote" name="description" id="description" required>{{ $call->description ?? '' }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
