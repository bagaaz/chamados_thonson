@extends('layout.layout')
@section('title', 'Chamados')

@section('content')
    <div class="content">

        <form action="{{ route('chamado.store') }}" method="POST" class="h-100 d-flex flex-column justify-content-between">
            @csrf
            <div class="row g-3 my-3">

                <div class="input-group col-12">
                    <span class="input-group-text" id="titulo">Título</span>
                    <input type="text" class="form-control" aria-label="titulo" aria-describedby="addon-wrapping" name="titulo" value="{{ old('titulo') }}" required>
                </div>

                <div class="input-group col-12">
                    <span class="input-group-text">Descrição</span>
                    <textarea class="form-control" aria-label="Descrição" name="descricao" id="descricao" required>{{ old('descricao') }}</textarea>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text" id="os">O.S.:</span>
                        <input type="text" class="form-control" aria-label="os" aria-describedby="addon-wrapping" name="os" value="{{ old('os') }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text" id="mnemonico-shift">Mnemônico Shift:</span>
                        <input type="text" class="form-control" aria-label="mnemonico-shift" aria-describedby="addon-wrapping" name="mnemonico-shift" value="{{ old('mnemonico-shift') }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text" id="mnemonico-apoio">Mnemônico Apoio:</span>
                        <input type="text" class="form-control" aria-label="mnemonico-apoio" aria-describedby="addon-wrapping" name="mnemonico-apoio" value="{{ old('mnemonico-apoio') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="prioridade">Prioridade</label>
                        <select class="form-select" name="prioridade" id="prioridade">
                            <option value="" {{ old('prioridade') == '' ? 'selected' : '' }}>Selecione uma opção...</option>
                            <option value="1" {{ old('prioridade') == '1' ? 'selected' : '' }}>Baixo</option>
                            <option value="2" {{ old('prioridade') == '2' ? 'selected' : '' }}>Médio</option>
                            <option value="3" {{ old('prioridade') == '3' ? 'selected' : '' }}>Alto</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="imagens">Imagens</label>
                        <input type="file" name="imagens" class="form-control" id="imagens" accept="image/*" value="{{ old('imagens') }}">
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
        </form>

    </div>

@endsection
