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
                            <input type="text" class="form-control" id="searchInput" placeholder="Pesquise um chamado..."
                                aria-label="Pesquise um chamado..." aria-describedby="button-addon2">
                            <button class="btn btn-primary mb-0" type="button" id="button-addon2" onclick="search()"><i class="fas fa-search"
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 sortable asc">Título</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2 sortable">
                                    Prioridade</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 sortable">
                                    Status</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 sortable">
                                    Abertura</th>
                            </tr>
                        </thead>
                        <tbody id="callsTable">
                            @foreach ($calls as $call)
                                <tr>
                                    <td style="width: .2rem">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $call->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="{{ route('calls.show', ['call' => $call->id]) }}">
                                                    <h6 class="mb-0 text-sm link-primary">{{ $call->title }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($call->priority->name == 'Baixa')
                                            <span class="badge bg-gradient-success">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call->priority->name }}</p>
                                            </span>
                                        @elseif ($call->priority->name == 'Média')
                                            <span class="badge bg-gradient-info">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call->priority->name }}</p>
                                            </span>
                                        @elseif ($call->priority->name == 'Alta')
                                            <span class="badge bg-gradient-warning">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call->priority->name }}</p>
                                            </span>
                                        @elseif ($call->priority->name == 'Crítica')
                                            <span class="badge bg-gradient-danger">
                                                <p class="text-sm font-weight-bold mb-0">{{ $call->priority->name }}</p>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($call->status->name == 'Aberto')
                                            <p class="text-sm font-weight-bold text-success mb-0">{{ $call->status->name }}
                                            </p>
                                        @elseif ($call->status->name == 'Em espera')
                                            <p class="text-sm font-weight-bold text-warning mb-0">{{ $call->status->name }}
                                            </p>
                                        @elseif ($call->status->name == 'Em andamento')
                                            <p class="text-sm font-weight-bold text-info mb-0">{{ $call->status->name }}
                                            </p>
                                        @elseif ($call->status->name == 'Cancelado')
                                            <p class="text-sm font-weight-bold text-danger mb-0">{{ $call->status->name }}
                                            </p>
                                        @elseif ($call->status->name == 'Concluído')
                                            <p class="text-sm font-weight-bold text-dark mb-0">{{ $call->status->name }}
                                            </p>
                                        @endif
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">{{ $call->created_date }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav class="mt-4" aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item @if ($calls->onFirstPage()) disabled @endif">
                                <a class="page-link" href="{{ $calls->previousPageUrl() }}" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Anterior</span>
                                </a>
                            </li>
                            @if ($calls->currentPage() > 2)
                            <li class="page-item"><a class="page-link" href="{{ $calls->url(1) }}">1</a></li>
                            @endif
                            @if ($calls->currentPage() > 3)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            @foreach (range(1, $calls->lastPage()) as $page)
                            @if ($page >= $calls->currentPage() - 1 && $page <= $calls->currentPage() + 1)
                            <li class="page-item @if ($page == $calls->currentPage()) active @endif">
                                <a class="page-link" href="{{ $calls->url($page) }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach
                            @if ($calls->currentPage() < $calls->lastPage() - 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            @if ($calls->currentPage() < $calls->lastPage() - 1)
                            <li class="page-item"><a class="page-link" href="{{ $calls->url($calls->lastPage()) }}">{{ $calls->lastPage() }}</a></li>
                            @endif
                            <li class="page-item @if ($calls->currentPage() == $calls->lastPage()) disabled @endif">
                                <a class="page-link" href="{{ $calls->nextPageUrl() }}">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="sr-only">Próximo</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
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
    @push('js')
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

        function search() {
            let input = document.getElementById("searchInput").value;
            let tableBody = document.querySelector("#callsTable");

            fetch("{{ route('calls.ajax') }}?q=" + input)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    tableBody.innerHTML = "";
                    data.forEach(call => {
                        let priorityBadge;
                        if (call.priority_id === 1) {
                            priorityBadge = '<span class="badge bg-gradient-success"><p class="text-sm font-weight-bold mb-0">Baixa</p></span>';
                        } else if (call.priority_id === 2) {
                            priorityBadge = '<span class="badge bg-gradient-info"><p class="text-sm font-weight-bold mb-0">Média</p></span>';
                        } else if (call.priority_id === 3) {
                            priorityBadge = '<span class="badge bg-gradient-warning"><p class="text-sm font-weight-bold mb-0">Alta</p></span>';
                        } else if (call.priority_id === 4) {
                            priorityBadge = '<span class="badge bg-gradient-danger"><p class="text-sm font-weight-bold mb-0">Crítica</p></span>';
                        }

                        let statusParagraph;
                        if (call.status_id === 1) {
                            statusParagraph = '<p class="text-sm font-weight-bold text-success mb-0">Aberto</p>';
                        } else if (call.status_id === 2) {
                            statusParagraph = '<p class="text-sm font-weight-bold text-warning mb-0">Em espera</p>';
                        } else if (call.status_id === 3) {
                            statusParagraph = '<p class="text-sm font-weight-bold text-info mb-0">Em andamento</p>';
                        } else if (call.status_id === 4) {
                            statusParagraph = '<p class="text-sm font-weight-bold text-danger mb-0">Cancelado</p>';
                        } else if (call.status_id === 5) {
                            statusParagraph = '<p class="text-sm font-weight-bold text-dark mb-0">Concluído</p>';
                        }

                        let newRow = `
                            <tr>
                                <td style="width: .2rem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${call.id}">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">${call.title}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">${priorityBadge}</td>
                                <td class="align-middle text-center text-sm">${statusParagraph}</td>
                                <td class="align-middle text-end">
                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                        <p class="text-sm font-weight-bold mb-0">${new Date(call.created_at).toLocaleDateString('pt-BR')}</p>
                                    </div>
                                </td>
                            </tr>
                        `;

                        tableBody.innerHTML += newRow;
                    });
                })
                .catch(error => {
                    console.error('Ocorreu um erro:', error);
                });
        }

    </script>
    @endpush
@endsection
