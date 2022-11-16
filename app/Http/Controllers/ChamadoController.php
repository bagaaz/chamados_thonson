<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\Models\Chamado;
use Illuminate\Support\Facades\Auth;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chamados = Chamado::paginate(10);

        return view('chamado.chamados', ['chamados' => $chamados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chamado.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChamadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoRequest $request)
    {
        $chamado = $request->all();
        $userId = Auth::user()->id;

        Chamado::create([
            'titulo' => $chamado['titulo'],
            'descricao' => $chamado['descricao'],
            'os' => $chamado['os'],
            'mnemonico_shift' => $chamado['mnemonico-shift'],
            'mnemonico_apoio' => $chamado['mnemonico-apoio'],
            'prioridade_id' => $chamado['prioridade'],
            'imagens' => $chamado['imagens'],
            'usuario_id' => $userId
        ]);

        return redirect()->route('user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        $chamado = Chamado::find($chamado);

        return view('chamado.show', ['chamado' => $chamado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        $chamado = Chamado::find($chamado);

        return view('chamado.edit', ['chamado' => $chamado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChamadoRequest  $request
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        $chamado = Chamado::find($chamado);
        $chamado->update(['titulo' => $chamado['titulo'], 'descricao' => $chamado['descricao'], 'os' => $chamado['os'], 'mnemonico_shift' => $chamado['mnemonico_shift'], 'mnemonico_apoio' => $chamado['mnemonico_apoio'], 'prioridade_id' => $chamado['prioridade_id'], 'imagens' => $chamado['imagens']]);
        dd($chamado);

        // return view('chamado.view', ['chamado' => $chamado]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamado $chamado)
    {
        $chamado = Chamado::find($chamado)->delete();

        // return redirect()->route('chamado.chamados');
    }
}
