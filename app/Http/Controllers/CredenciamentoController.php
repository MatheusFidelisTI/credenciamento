<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CredenciamentoController extends Controller
{
    public function index()
    {
        return view('credenciamento.index', [
            'users' => User::all(),
            'idade' => '14'
        ]);
    }
}
