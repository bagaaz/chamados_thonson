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
        <div class="content_results py-3 overflow-auto">
            <div class="chamado">
                <div class="chamado__header row">
                    <div class="chamado__header_number col-10"> Chamado Nº {{$chamado['id']}}</div>
                    @if ($chamado['prioridade_id'] == 1)
                            <div class="chamado__header_priority col-2 text-end"><span style="color: green">{{ucfirst($chamado['prioridade'])}}</span></div>
                        @elseif ($chamado['prioridade_id'] == 2)
                            <div class="chamado__header_priority col-2 text-end"><span style="color: blue">{{ucfirst($chamado['prioridade'])}}</span></div>
                        @elseif ($chamado['prioridade_id'] == 3)
                            <div class="chamado__header_priority col-2 text-end"><span style="color: orange">{{ucfirst($chamado['prioridade'])}}</span></div>
                        @elseif ($chamado['prioridade_id'] == 4)
                            <div class="chamado__header_priority col-2 text-end"><span style="color: red">{{ucfirst($chamado['prioridade'])}}</span></div>
                        @endif
                </div>
                <div class="chamado__info">
                    <div class="row">
                        <div class="col-8">Criado por: <span class="fw-bold">{{$chamado['usuario']}}</span></div>
                        <div class="col-4 text-end">Criado em: <span class="fw-bold">{{$chamado['data_criacao']}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-12">Título: <span class="fw-bold">{{$chamado['titulo']}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Mnemônico Shift: <span class="fw-bold">{{$chamado['mnemonico_shift']}}</span></div>
                        <div class="col-6 text-end">Mnemônico Apoio: <span class="fw-bold">{{$chamado['mnemonico_apoio']}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-12">O.S.: <span class="fw-bold">{{$chamado['os']}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-12">Descrição: <span class="fw-bold">{{$chamado['descricao']}}</span></div>
                    </div>
                </div>
                <div class="chamado__imgs">
                    <div class="chamado__imgs_title">
                            <span class="chamado__imgs_title">Imagens</span>
                    </div>
                    <div class="chamado__imgs_content">
                        <div class="row my-3">
                            <div class="chamado__imgs_content_img col-4 d-flex justify-content-center">
                                <img class="mx-auto" src="https://via.placeholder.com/150" alt="">
                            </div>
                            <div class="chamado__imgs_content_img col-4 d-flex justify-content-center">
                                <img class="mx-auto" src="https://via.placeholder.com/150" alt="">
                            </div>
                            <div class="chamado__imgs_content_img col-4 d-flex justify-content-center">
                                <img class="mx-auto" src="https://via.placeholder.com/150" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chamado__comentarios">
                    <div class="chamado__comentarios_header">
                        <span class="chamado__comentarios_header_title">Comentários</span><span class="comentarios__count">1</span>
                    </div>
                    <div class="chamado__comentarios_content">

                        <div class="chamado__comentarios_content_item">
                            <div class="chamado__comentarios_content_item_header row">
                                <span class="chamado__comentarios_content_item_header_user_name col-12 fw-bold">Gabriel Oliveira em 18/07/2022</span>
                            </div>
                            <div class="chamado__comentarios_content_item_body row">
                                <span class="chamado__comentarios_content_item_body_text col-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</span>
                            </div>
                        </div>

                        <div class="chamado__comentarios_content_item">
                            <div class="chamado__comentarios_content_item_header row">
                                <span class="chamado__comentarios_content_item_header_user_name col-12 fw-bold">Gabriel Oliveira em 18/07/2022</span>
                            </div>
                            <div class="chamado__comentarios_content_item_body row">
                                <span class="chamado__comentarios_content_item_body_text col-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</span>
                            </div>
                        </div>

                        <div class="chamado__comentarios_content_item">
                            <div class="chamado__comentarios_content_item_header row">
                                <span class="chamado__comentarios_content_item_header_user_name col-12 fw-bold">Gabriel Oliveira em 18/07/2022</span>
                            </div>
                            <div class="chamado__comentarios_content_item_body row">
                                <span class="chamado__comentarios_content_item_body_text col-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</span>
                            </div>
                        </div>

                        <div class="chamado__comentarios_content_item">
                            <div class="chamado__comentarios_content_item_header row">
                                <span class="chamado__comentarios_content_item_header_user_name col-12 fw-bold">Gabriel Oliveira em 18/07/2022</span>
                            </div>
                            <div class="chamado__comentarios_content_item_body row">
                                <span class="chamado__comentarios_content_item_body_text col-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</span>
                            </div>
                        </div>

                        <div class="chamado__comentarios_content_item">
                            <div class="chamado__comentarios_content_item_header row">
                                <span class="chamado__comentarios_content_item_header_user_name col-12 fw-bold">Gabriel Oliveira em 18/07/2022</span>
                            </div>
                            <div class="chamado__comentarios_content_item_body row">
                                <span class="chamado__comentarios_content_item_body_text col-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

