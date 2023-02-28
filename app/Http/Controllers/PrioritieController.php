<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrioritieRequest;
use App\Http\Requests\UpdatePrioritieRequest;
use App\Models\Priority;

class PrioritieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::all();

        return view('pages.priorities.priorities-list', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.priorities.priorities-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrioritieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrioritieRequest $request)
    {
        try {
            $priority = Priority::create($request->validated());

            return redirect()->route('priorities')->with('success', 'Prioridade cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar prioridade! - ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prioritie  $prioritie
     * @return \Illuminate\Http\Response
     */
    public function edit(Priority $priority)
    {
        return view('pages.priorities.priorities-form', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrioritieRequest  $request
     * @param  \App\Models\Prioritie  $prioritie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrioritieRequest $request, Priority $priority)
    {
        try {
            $priority->update($request->validated());

            return redirect()->route('priorities')->with('success', 'Prioridade atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar prioridade! - ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prioritie  $prioritie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        try {
            $priority->delete();

            return redirect()->route('priorities')->with('success', 'Prioridade excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir prioridade! -' . $e->getMessage());
        }
    }
}
