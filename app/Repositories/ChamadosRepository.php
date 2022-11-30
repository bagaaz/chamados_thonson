<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ChamadosRepository extends BaseRepository
{
    public function getChamadoDados()
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
                chamados.id = 1

        ";

        $consulta = DB::select($query);

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
                'data_criacao' => $this->converteData($chamado->created_at)
            ];
        })->toArray();

        return $dados[0];
    }
}
