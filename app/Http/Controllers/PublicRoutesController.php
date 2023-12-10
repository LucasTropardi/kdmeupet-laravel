<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicRoutesController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function achados()
    {
        return view('public.achados');
    }

    public function perdidos()
    {
        return view('public.perdidos');
    }

    public function parcerias()
    {
        return view('public.parcerias');
    }

    public function localizacoes()
    {
        return view('public.localizacoes');
    }

    public function adocoes()
    {
        return view('public.adocoes');
    }
}
