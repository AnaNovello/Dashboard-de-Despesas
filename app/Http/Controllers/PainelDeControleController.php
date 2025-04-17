<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelDeControleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('PainelDeControle', compact('user'));
    }
}
?>