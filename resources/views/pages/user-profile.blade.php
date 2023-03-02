@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Meu Perfil'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->avatar ?? './img/profile-img.svg' }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->firstname ?? 'Nome' }} {{ auth()->user()->lastname ?? 'Sobrenome' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ App\Models\Role::find(auth()->user()->role_id)->name ?? 'Função' }}
                        </p>
                    </div>
                </div>
                <div class="col-auto ms-auto d-flex align-items-center">
                    <button class="btn btn-sm btn-danger mb-0" data-bs-toggle="modal" data-bs-target="#change-password-modal">Alterar senha</button>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
        @if ($errors->any())
            <div class="alert alert-danger mx-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-light">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Editar Perfil</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Salvar</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Informação de Usuario</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Apelido</label>
                                        <input class="form-control" type="text" name="username" value="{{ old('username', auth()->user()->username) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nome</label>
                                        <input class="form-control" type="text" name="firstname"  value="{{ old('firstname', auth()->user()->firstname) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Sobrenome</label>
                                        <input class="form-control" type="text" name="lastname" value="{{ old('lastname', auth()->user()->lastname) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')

        <!-- Modal -->
        <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="change-password-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="change-password-modal-label">Alterar senha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <form action="{{ route('profile.update.password') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="current-password" class="form-label">Senha atual</label>
                                <input type="password" name="current_password" id="current-password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">Nova senha</label>
                                <input type="password" name="new_password" id="new-password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="new-password-confirm" class="form-label">Confirmar nova senha</label>
                                <input type="password" name="new_password_confirmation" id="new-password-confirm" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        @push('js')
            <script>
                $(document).ready(function() {
                    $('.selectpicker').selectpicker();
                });
            </script>
        @endpush
    </div>
@endsection
