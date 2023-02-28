@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => empty($user) ? 'Criar Usuário' : 'Editar Usuário',
    ])
    <div class="row mt-4 mx-4">
        <div class="card mb-4">
            <div class="row card-header pb-0">
                <div class="col-4 col-md-2">
                    <a href="{{ route('users') }}" class="btn btn-icon btn-3 btn-secondary w-100 mb-0">
                        <span class="btn-inner--icon"><i class="fa-solid fa-caret-left" aria-hidden="true"></i></span>
                        <span class="btn-inner--text d-none d-md-inline">Voltar</span>
                    </a>
                </div>
                <div class="col-4 col-md-8"></div>
                <div class="col-4 col-md-2">
                    <button onclick="document.getElementById('newUserForm').submit();"
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
                    {{ empty($user) ? 'Novo Usuário' : 'Editar Usuário' }}</p>
                <form action="{{ empty($user) ? route('users.store') : route('users.update', ['user' => $user->id]) }}"
                    method="POST" enctype="multipart/form-data" id="newUserForm">
                    @csrf
                    @if (!empty($user))
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    @endif
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname" class="form-control-label">Nome</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    aria-label="Nome" value="{{ $user->firstname ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname" class="form-control-label">Sobrenome</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    aria-label="Sobrenome" value="{{ $user->lastname ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="form-control-label">Apelido</label>
                                <input type="text" class="form-control" id="username" name="username" aria-label="Apelido"
                                    value="{{ $user->username ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email ?? '' }}" aria-label="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fa-regular fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="top" title="Senha padrão do sistema, o usuário deverá alterar no primeiro login."></i>
                                <label for="password" class="form-control-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    aria-label="123456" placeholder="123456" value="{{ $user->password ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role_id" class="form-control-label">Função</label>
                                <select class="form-control" name="role_id" id="role_id" required>
                                    <option value="" {{ empty($user->role_id) ? 'selected' : '' }}>Selecione uma
                                        opção...</option>
                                    @foreach ($roles as $role)
                                        @if (!empty($user))
                                            <option value="{{ $role['id'] }}"
                                                {{ $user->role_id == $role['id'] ? 'selected' : '' }}>
                                                {{ $role['name'] }}
                                            </option>
                                        @else
                                            <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
