<?php

namespace App\Repositories;

class BaseRepository
{
    public function converteData($data):string
    {
        $dataFormatada = \Carbon\Carbon::parse($data)->format('d/m/Y');

        return $dataFormatada;
    }
}
