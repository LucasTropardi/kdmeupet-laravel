<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AuthenticatedRoutesController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function achados()
    {
        $countAnimais = Animal::where('situacao_id', 4)->count();
        $animais = Animal::where('situacao_id', 4)
            ->where('anFinalizado', 0)
            ->orderBy('anData', 'desc')
            ->paginate(9);

        return view('logado.usuario.achados.achados', [
            'animais'      => $animais,
            'countAnimais' => $countAnimais,
        ]);
    }

    public function perdidos()
    {
        $countAnimais = Animal::where('situacao_id', 3)->count();
        $animais = Animal::where('situacao_id', 3)
            ->where('anFinalizado', 0)
            ->orderBy('anData', 'desc')
            ->paginate(9);

        return view('logado.usuario.perdidos.perdidos', [
            'animais'      => $animais,
            'countAnimais' => $countAnimais,
        ]);
    }
}
