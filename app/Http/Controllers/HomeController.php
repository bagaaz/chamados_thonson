<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $chamados;

    public function index()
    {
        $openedCalls = Call::where('status_id', 1)->count();
        $concludedCalls = Call::where('status_id', 5)->count();
        $waitingCalls = Call::where('status_id', 2)->count();
        $cancelledCalls = Call::where('status_id', 4)->count();

        $callsLastNineDays = $this->callsInLastNineDays();

        return view('pages.dashboard', compact('openedCalls', 'concludedCalls', 'waitingCalls','cancelledCalls', 'callsLastNineDays'));
    }

    public function callsInLastNineDays()
    {
        // Cria um array com todos os dias dos últimos 7 dias
        $days = [];
        for ($i = 8; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i)->format('Y-m-d');
            $days[$day] = 0;
        }

        // Faz a consulta e preenche o array com os valores correspondentes
        $calls = Call::whereBetween('created_at', [Carbon::now()->subDays(8), Carbon::now()])
        ->selectRaw('date(created_at) as day, count(*) as total')
        ->groupBy('day')
        ->get();

        $daysFormated = [];
        foreach ($calls as $call) {
            $days[$call->day] = $call->total;
        }
        foreach ($days as $key => $value) {
            $daysFormated[Carbon::parse($key)->format('d/m')] = $value;
        }

        // Cria um array com as chaves e outro com os valores do array $dias
        $labels = array_keys($daysFormated);
        $results = array_values($daysFormated);

        return [
            'labels' => $labels,
            'results' => $results
        ];
    }
}
