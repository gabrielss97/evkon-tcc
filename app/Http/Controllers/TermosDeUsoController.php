<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermosDeUsoController extends Controller
{
    public function index()
    {
        return view('termos_uso');
    }
}
