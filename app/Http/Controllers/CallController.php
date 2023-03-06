<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCallRequest;
use App\Http\Requests\UpdateCallRequest;
use App\Models\Call;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $calls = Call::with(['priority', 'status'])->select('*', DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as created_date'))->paginate(10);

        return view("pages.calls.calls-list", compact('calls'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        return view("pages.calls.calls-show", compact('call'));
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

    public function ajax(Request $request)
    {
        $query = $request->get('q');

        //Execute a pesquisa no banco de dados e retorne uma resposta JSON com os resultados
        $results = Call::where('title', 'LIKE', '%' . $query . '%')
                        ->orWhere('id', $query)
                        ->get();

        return response()->json($results);
    }
}
