@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Chamados'])

    <div class="row mt-4 mx-4">
        <div class="card mb-4">
            <div class="row card-header pb-0">
                <div class="col-12 col-md-10 @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) col-md-8  @endif mb-3 mb-md-0">
                    <h3 class="mb-0">Visualizar Chamado</h3>
                </div>
                <div class="col-6 col-md-2 text-end">
                    <a class="btn btn-secundary w-100" href="#message">Comentários</a>
                </div>
                @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                <div class="col-6 col-md-2 text-end">
                    <button onclick="document.getElementById('callForm').submit();" class="btn btn-icon btn-3 btn-primary mb-0 w-100">
                        <span class="btn-inner--icon"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i></span>
                        <span class="btn-inner--text">Salvar</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('calls.update', $call->id) }}" class="d-inline" id="callForm">
                @csrf
                <div class="row px-1">
                    <div class="col-12">
                        <strong>Chamado aberto por:</strong>
                        <p>{{$call->caller->firstname . ' ' . $call->caller->lastname}}</p>
                    </div>
                </div>
                <div class="row px-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Título</label>
                            <input type="text" class="form-control" id="title" name="title" aria-label="Título"
                                value="{{ $call->title ?? '' }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="service_order" class="form-control-label">O.S.</label>
                            <input type="text" class="form-control" id="service_order" name="service_order"
                                value="{{ $call->service_order ?? '' }}" aria-label="O.S." pattern="^\d{3}-\d{5}-\d{4}$"
                                placeholder="001-65648-0001" disabled>
                        </div>
                    </div>
                </div>
                <div class="row px-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="local_mnemonic" class="form-control-label">Mnemônico Shift</label>
                            <input type="text" class="form-control" id="local_mnemonic" name="local_mnemonic"
                                aria-label="Mnemônico Shift" value="{{ $call->local_mnemonic ?? '' }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="outside_mnemonic" class="form-control-label">Mnemônico Apoio</label>
                            <input type="text" class="form-control" id="outside_mnemonic" name="outside_mnemonic"
                                aria-label="Mnemônico Apoio" value="{{ $call->outside_mnemonic ?? '' }}" disabled>
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
                            <label for="status_id">Alterar status:</label>
                            <select class="form-control" name="status_id" id="status_id">
                                <option value="1" {{ $call->status->name == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                                <option value="2" {{ $call->status->name == 'Em espera' ? 'selected' : '' }}>Em espera</option>
                                <option value="3" {{ $call->status->name == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                                <option value="4" {{ $call->status->name == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                <option value="5" {{ $call->status->name == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row px-1">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Descrição</label>
                            <textarea class="summernote d-none" name="description" id="description" required disabled="true">{{ $call->description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="row mt-4 mx-4" id="message">
        <div class="card mb-4">
            <div class="row card-header pb-0">
                <h3 class="mb-0">Comentários</h3>
            </div>
            <div class="card-body">
                <div class="row px-1">
                    <div class="col-12">
                        <p>Menssagem</p>
                    </div>
                </div>
            </div>
            <div class="row card-footer">
                <form method="post" action="#">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label for="comentario">Adicionar comentário:</label>
                            <textarea class="summernote" name="comentario" id="comentario" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Comentar</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')

    @push('js')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
            });
        });
    </script>
    @endpush

@endsection
