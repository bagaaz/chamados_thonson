@extends('layout.layout')
@section('title', 'Usuarios')

@section('content')
    <div class="content">

        <form action="{{ route('usuario.store') }}" method="POST" class="h-100 d-flex flex-column justify-content-between">
            @csrf

            <div class="row g-3 my-3">
                <div class="col-md-6">
                   <div class="input-group">
                        <span class="input-group-text" id="nome">Nome</span>
                        <input type="text" class="form-control" aria-label="nome" aria-describedby="addon-wrapping" name="nome" value="{{ old('nome') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text" id="sobrenome">Sobrenome</span>
                        <input type="text" class="form-control" aria-label="sobrenome" aria-describedby="addon-wrapping" name="sobrenome" value="{{ old('sobrenome') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text" id="cpf">CPF</span>
                        <input type="text" class="form-control" aria-label="cpf" aria-describedby="addon-wrapping" name="cpf" value="{{ old('cpf') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text" id="email">E-mail</span>
                        <input type="email" class="form-control" aria-label="email" aria-describedby="addon-wrapping" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group col-12">
                        <span class="input-group-text" id="senha">Senha</span>
                        <input type="password" class="form-control" aria-label="senha" aria-describedby="addon-wrapping" name="senha" value="{{ old('senha') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="nivel_acesso_id">Nível de Acesso</label>
                        <select class="form-select" name="nivel_acesso_id" id="nivel_acesso_id">
                            <option value="" {{ old('nivel_acesso_id') == '' ? 'selected' : '' }}>Selecione uma opção...</option>
                            <option value="0" {{ old('nivel_acesso_id') == '0' ? 'selected' : '' }}>Admin</option>
                            <option value="1" {{ old('nivel_acesso_id') == '1' ? 'selected' : '' }}>Suporte</option>
                            <option value="2" {{ old('nivel_acesso_id') == '2' ? 'selected' : '' }}>Usuario</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>

    </div>

@endsection
