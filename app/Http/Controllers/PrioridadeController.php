<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrioridadeRequest;
use App\Http\Requests\UpdatePrioridadeRequest;
use App\Models\Prioridade;

class PrioridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrioridadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrioridadeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prioridade  $prioridade
     * @return \Illuminate\Http\Response
     */
    public function show(Prioridade $prioridade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prioridade  $prioridade
     * @return \Illuminate\Http\Response
     */
    public function edit(Prioridade $prioridade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrioridadeRequest  $request
     * @param  \App\Models\Prioridade  $prioridade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrioridadeRequest $request, Prioridade $prioridade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prioridade  $prioridade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prioridade $prioridade)
    {
        //
    }
}
