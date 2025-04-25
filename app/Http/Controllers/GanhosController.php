<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ganhos;
use App\Models\ContasDebito;
use Illuminate\Support\Facades\Auth;

class GanhosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function salvar(Request $request){

        $request->validate([
            'conta_debito_id' => 'required|exists:contas_debito,id',
            'nome' => 'required|string|max:255',
            'observacao' => 'nullable|string|max:1000',
            'valor' => 'required|numeric|min:0',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        Ganhos::create([
            'conta_debito_id' => $request->conta_debito_id,
            'nome' => $request->nome,
            'observacao' => $request->observacao,
            'valor' => $request->valor,
            'data' => $request->data,
            'hora' => $request->hora,
        ]);

        $ganhos = Ganhos::where('conta_debito_id', $request->conta_debito_id)->get();

        return response()->json([
            'html' => view('contas.debito.partials.ganhos', compact('ganhos'))->render()
        ]);
    }
    public function listarPorConta($contaId){
        $conta = ContasDebito::findOrFail($contaId);
        $ganhos = $conta->ganhos()->orderByDesc('data')->orderByDesc('hora')->get();

        return view('contas.debito.partials.ganhos', compact('conta', 'ganhos'));
    }

}
