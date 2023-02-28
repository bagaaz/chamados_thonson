<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $chamados;
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $openedCalls = Call::where('status_id', 1)->count();
        $concludedCalls = Call::where('status_id', 5)->count();
        $waitingCalls = Call::where('status_id', 2)->count();
        $cancelledCalls = Call::where('status_id', 4)->count();
        return view('pages.dashboard', compact('openedCalls', 'concludedCalls', 'waitingCalls','cancelledCalls'));
    }
}
