<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = collect(Status::all())->map(function ($status) {
            return [
                'id' => $status->id,
                'name' => $status->name
            ];
        });

        return view("pages.status.status-list", compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.status.status-form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusRequest $request)
    {
        try {
            $data = $request->only(['name']);

            Status::create([
                'name' => $data['name'],
            ]);

            return redirect()->route('status')->with('success', 'Status cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('status')->with('error', 'Erro ao cadastrar status! - ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view("pages.status.status-form", compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusRequest  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        try {
            $data = $request->only(['name']);

            $status->update([
                'name' => $data['name'],
            ]);

            return redirect()->route('status')->with('success', 'Status atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('status')->with('error', 'Erro ao atualizar status! - ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        try {
            $status->delete();

            return redirect()->route('status')->with('success', 'Status excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('status')->with('error', 'Erro ao excluir status! - ' . $e->getMessage());
        }
    }
}
