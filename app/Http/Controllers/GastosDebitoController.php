<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GastosDebito;
use App\Models\ContasDebito;


class GastosDebitoController extends Controller
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
            'nome' => 'required|string|max:255',
            'observacao' => 'nullable|string',
            'categoria' => 'required|string',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'hora' => 'required',
            'conta_debito_id' => 'required|exists:contas_debito,id',
        ]);

        GastosDebito::create($request->all());

        return redirect()->back()->with('success', 'Gasto adicionado com sucesso!');
    }

    public function listarPorConta($contaId){
        $conta = ContasDebito::findOrFail($contaId);
        $gastos = $conta->gastos()->orderByDesc('data')->orderByDesc('hora')->get();

        $dadosGrafico = $gastos->groupBy('categoria')->map(function($group){
            return $group->sum('valor');
        });

        return view('contas.debito.partials.gastos', [
            'conta' => $conta,
            'gastos' => $gastos,
            'dadosGrafico' => $dadosGrafico
        ]);
    }


}
