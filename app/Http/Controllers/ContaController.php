<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function cadastrar()
    {
        return view('contas.cadastrar');
    }

    public function editar()
    {
        return view('contas.editar');
    }

    public function excluir()
    {
        return view('contas.excluir');
    }
}
