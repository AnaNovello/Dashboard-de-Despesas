<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContasDebito;
use Illuminate\Support\Facades\Auth;



class ContasDebitoController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        ContasDebito::create([
            'nome' => $request->input('nome'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('PainelDeControle')->with('success', 'Conta de débito cadastrada com sucesso!');
    }

    public function extrato($id)
    {
        $conta = ContasDebito::findOrFail($id);
        return view('contas.debito.extrato', compact('conta'));
    }

}
