<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ChamadosRepository extends BaseRepository
{
    public function getChamadoDados($chamadoId)
    {
        $query = "
            SELECT
                chamados.id,
                chamados.titulo,
                chamados.descricao,
                chamados.os,
                chamados.mnemonico_shift,
                chamados.mnemonico_apoio,
                chamados.prioridade_id,
                prioridades.prioridade,
                chamados.imagens,
                chamados.usuario_id,
                users.name as usuario,
                chamados.created_at
            FROM
                chamados
            JOIN
                prioridades
            ON
                chamados.prioridade_id = prioridades.prioridade_id
            JOIN
                users
            ON
                chamados.usuario_id = users.id
            WHERE
                chamados.id = {$chamadoId}

        ";

        $queryComentarios = "
            SELECT
                comentarios.id,
                comentarios.comentario,
                comentarios.chamados_id,
                comentarios.usuarios_id,
                users.name as usuario,
                comentarios.created_at
            FROM
                comentarios
            JOIN
                users
            ON
                comentarios.usuarios_id = users.id
            WHERE
                comentarios.chamados_id = {$chamadoId}";

        $consulta = DB::select($query);
        $consultaComentarios = DB::select($queryComentarios);

        $dadosComentarios = collect($consultaComentarios)->map(function ($comentario) {

            return [
                'id' => $comentario->id,
                'comentario' => $comentario->comentario,
                'chamado_id' => $comentario->chamados_id,
                'usuario_id' => $comentario->usuarios_id,
                'usuario' => $comentario->usuario,
                'data_criacao' => $this->converteData($comentario->created_at),
            ];
        })->toArray();

        $dados = collect($consulta)->map(function ($chamado) {

            return [
                'id' => $chamado->id,
                'titulo' => $chamado->titulo,
                'descricao' => $chamado->descricao,
                'os' => $chamado->os,
                'mnemonico_shift' => $chamado->mnemonico_shift,
                'mnemonico_apoio' => $chamado->mnemonico_apoio,
                'prioridade_id' => $chamado->prioridade_id,
                'prioridade' => $chamado->prioridade,
                'imagens' => $chamado->imagens,
                'usuario_id' => $chamado->usuario_id,
                'usuario' => $chamado->usuario,
                'data_criacao' => $this->converteData($chamado->created_at),
            ];
        })->toArray();

        $dados[0]['comentarios'] = $dadosComentarios;

        return $dados[0];
    }
}
