<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCallRequest;
use App\Http\Requests\UpdateCallRequest;
use App\Models\Call;
use App\Models\Priority;
use App\Support\Helpers;

class CallController extends Controller
{
    public $priorities;

    public function __construct()
    {
        $this->priorities = Priority::select('id', 'name')->get()->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = collect(Call::with(['priority', 'status'])->get())->map(function ($call) {
            return [
                'id' => $call->id,
                'title' => $call->title,
                'priority' => $call->priority->name,
                'status' => $call->status->name,
                'created_at' => Helpers::formatDate($call->created_at),
            ];
        });

        return view("pages.calls.calls-list", compact('calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = $this->priorities;

        return view("pages.calls.calls-form", compact('priorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCallRequest $request)
    {
        try {
            $call = Call::create([
                'title' => $request->title,
                'description' => $request->description,
                'service_order' => $request->service_order,
                'local_mnemonic' => $request->local_mnemonic,
                'outside_mnemonic' => $request->outside_mnemonic,
                'priority_id' => (int) $request->priority_id,
                'caller_id' => (int) $request->caller_id,
                'status_id' => 1,
                'image' => $request->image,
            ]);

            return redirect('/calls')->with('success', 'Chamado criado com sucesso!');
        } catch (\Exception $e) {
            return redirect('/calls')->with('error', 'Erro ao criar chamado - ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        $priorities = $this->priorities;

        return view("pages.calls.calls-form", compact('priorities', 'call'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCallRequest  $request
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCallRequest $request, Call $call)
    {
        try {
            $call->update([
                'title' => $request->title,
                'description' => $request->description,
                'service_order' => $request->service_order,
                'local_mnemonic' => $request->local_mnemonic,
                'outside_mnemonic' => $request->outside_mnemonic,
                'priority_id' => (int) $request->priority_id,
                'caller_id' => (int) $request->caller_id,
                'status_id' => 1,
                'image' => $request->image,
            ]);

            return redirect('/calls')->with('success', 'Chamado atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect('/calls')->with('error', 'Erro ao atualizar chamado - ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        try {
            $call->delete();

            return redirect()->back()->with('success', 'Chamado excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir chamado - ' . $e->getMessage());
        }
    }
}
