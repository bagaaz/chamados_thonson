@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Chamados'])

    <div class="row mt-4 mx-4">
        <div class="card mb-4">
            <div class="row card-header pb-0">
                <div class="col-4 col-md-2">
                    <a href="{{ route('calls.create') }}" class="btn btn-icon btn-3 btn-primary w-100 mb-0">
                        <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Novo</span>
                    </a>
                </div>
                <div class="col-4 col-md-2">
                    <button onclick="verificaParametroId('{{ route('calls.edit', ['call' => 'param_id']) }}')"
                        class="btn btn-icon btn-3 btn-secondary w-100 mb-0" data-method="edit" data-bs-toggle="modal"
                        data-bs-target="#modalSelectOne">
                        <span class="btn-inner--icon "><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Editar</span>
                    </button>
                </div>
                <div class="col-4 col-md-2">
                    <button onclick="verificaParametroId('{{ route('calls.destroy', ['call' => 'param_id']) }}')"
                        class="btn btn-icon btn-3 btn-secondary w-100
                        mb-0" data-method="delete"
                        data-bs-toggle="modal" data-bs-target="#modalSelectOne">
                        <span class="btn-inner--icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Excluir</span>
                    </button>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <form action="{{ route('calls') }}" method="GET" class="mb-3">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pesquise um chamado..."
                                aria-label="Pesquise um chamado..." aria-describedby="button-addon2">
                            <button class="btn btn-primary mb-0" type="button" id="button-addon2"><i class="fas fa-search"
                                    aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <span class="text-light fw-bold">{{ session()->get('success') }}</span>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <span class="text-light fw-bold">{{ session()->get('error') }}</span>
                    </div>
                @endif
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">
                                    Prioridade</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">
                                    Status</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">
                                    Abertura</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calls as $call)
                                <tr>
                                    <td style="width: .2rem">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $call['id'] }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $call['title'] }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($call['priority'] == 'Baixa')
                                            <span class="badge bg-gradient-success">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call['priority'] }}</p>
                                            </span>
                                        @elseif ($call['priority'] == 'Média')
                                            <span class="badge bg-gradient-info">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call['priority'] }}</p>
                                            </span>
                                        @elseif ($call['priority'] == 'Alta')
                                            <span class="badge bg-gradient-warning">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call['priority'] }}</p>
                                            </span>
                                        @elseif ($call['priority'] == 'Crítica')
                                            <span class="badge bg-gradient-danger">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call['priority'] }}</p>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($call['status'] == 'Aberto')
                                            <p class="text-sm font-weight-bold text-success mb-0">{{ $call['status'] }}
                                            </p>
                                        @elseif ($call['status'] == 'Em espera')
                                            <p class="text-sm font-weight-bold text-warning mb-0">{{ $call['status'] }}
                                            </p>
                                        @elseif ($call['status'] == 'Em andamento')
                                            <p class="text-sm font-weight-bold text-info mb-0">{{ $call['status'] }}
                                            </p>
                                        @elseif ($call['status'] == 'Cancelado')
                                            <p class="text-sm font-weight-bold text-danger mb-0">{{ $call['status'] }}
                                            </p>
                                        @elseif ($call['status'] == 'Concluído')
                                            <p class="text-sm font-weight-bold text-dark mb-0">{{ $call['status'] }}
                                            </p>
                                        @endif
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">{{ $call['created_at'] }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSelectOne" tabindex="-1" role="dialog" aria-labelledby="modalSelectOneLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSelectOneLabel">Atenção</h5>
                    </button>
                </div>
                <div class="modal-body">
                    Atenção, Você deve selecionar ao menos um item da listagem!
                </div>
            </div>
        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const urlParams = new URLSearchParams(window.location.search);
        const editButton = document.querySelector('button[data-method="edit"]');
        const deleteButton = document.querySelector('button[data-method="delete"]');
        let lastChecked;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                const noOfSelectedCheckboxes = selectedCheckboxes.length;

                if (noOfSelectedCheckboxes > 0) {
                    editButton.dataset.bsTarget = '';
                    deleteButton.dataset.bsTarget = '';
                    editButton.classList.remove('btn-secondary');
                    deleteButton.classList.remove('btn-secondary');
                    editButton.classList.add('btn-primary');
                    deleteButton.classList.add('btn-danger');
                } else {
                    editButton.dataset.bsTarget = '#modalSelectOne';
                    deleteButton.dataset.bsTarget = '#modalSelectOne';
                    editButton.classList.remove('btn-primary');
                    deleteButton.classList.remove('btn-danger');
                    editButton.classList.add('btn-secondary');
                    deleteButton.classList.add('btn-secondary');
                }

                if (this.checked) {
                    if (lastChecked && lastChecked !== this) {
                        lastChecked.checked = false;
                    }
                    lastChecked = this;
                    urlParams.set('id', this.value);
                } else {
                    urlParams.delete('id');
                }
                const newUrl = window.location.origin + window.location.pathname + '?' + urlParams
                    .toString();
                window.history.replaceState({}, '', newUrl);
            });
        });

        function verificaParametroId(url) {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');

            if (id) {
                // Se o parâmetro "id" existir, redireciona o usuário para outra URL
                url = url.replace('param_id', id);
                window.location.href = url;
            }
        }
    </script>
@endsection
