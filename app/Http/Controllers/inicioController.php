<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class inicioController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('inicio', compact('categorias'));
    }
}
