<?php

namespace App\Support;

class Helpers
{
    public static function formatDate($date)
    {
        return $date->setTimezone('America/Sao_Paulo')->format('d/m/Y');
    }

    public static function formatDateTime($date)
    {
        return $date->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s')->setlocale('pt-br');
    }
}
