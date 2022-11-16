<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenssagemRequest;
use App\Http\Requests\UpdateMenssagemRequest;
use App\Models\Menssagem;

class MenssagemController extends Controller
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
     * @param  \App\Http\Requests\StoreMenssagemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenssagemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menssagem  $menssagem
     * @return \Illuminate\Http\Response
     */
    public function show(Menssagem $menssagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menssagem  $menssagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Menssagem $menssagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenssagemRequest  $request
     * @param  \App\Models\Menssagem  $menssagem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenssagemRequest $request, Menssagem $menssagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menssagem  $menssagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menssagem $menssagem)
    {
        //
    }
}
