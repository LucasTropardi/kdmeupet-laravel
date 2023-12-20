<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Mensagem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicRoutesController extends Controller
{
    public function home()
    {
        $countAchados = Animal::where('situacao_id', 4)
            ->where('anFinalizado', 0)
            ->count();

        $limitaAchados = 0;

        if ($countAchados >= 2 && $countAchados <= 4) {
            $limitaAchados = 2;
        } else {
            $limitaAchados = 5;
        }

        $countPerdidos = Animal::where('situacao_id', 3)
            ->where('anFinalizado', 0)
            ->count();

        $limitaPerdidos = 0;

        if ($countPerdidos >= 2 && $countPerdidos <= 4) {
            $limitaPerdidos = 2;
        } else {
            $limitaPerdidos = 5;
        }

        $achados = Animal::where('situacao_id', 4)
            ->where('anFinalizado', 0)
            ->orderBy('anData', 'desc')
            ->limit($limitaAchados)
            ->get();

        $perdidos = Animal::where('situacao_id', 3)
            ->where('anFinalizado', 0)
            ->orderBy('anData', 'desc')
            ->limit($limitaPerdidos)
            ->get();

        return view('public.home', [
            'achados'  => $achados,
            'perdidos' => $perdidos,
        ]);
    }

    public function achados()
    {
        $animais = Animal::where('situacao_id', 4)
            ->where('anFinalizado', 0)
            ->orderBy('anData', 'desc')
            ->paginate(9);

        return view('public.achados', [
            'animais' => $animais,
        ]);
    }

    public function perdidos()
    {
        $animais = Animal::where('situacao_id', 3)
            ->where('anFinalizado', 0)
            ->orderBy('anData', 'desc')
            ->paginate(9);

        return view('public.perdidos', [
            'animais' => $animais,
        ]);
    }

    public function ver_animal($id)
    {
        $animal = Animal::findOrFail($id);
        $mensagens = Mensagem::where('animal_id', $animal->id)
            ->orderBy('dataMensagem', 'desc')
            ->paginate(5);
        $countMsg = Mensagem::where('animal_id', $animal->id)->count();
        $dataCadastrada = Carbon::parse($animal->anData)->format('d/m/Y');
        return view('public.ver_animal', [
            'animal'         => $animal,
            'dataCadastrada' => $dataCadastrada,
            'mensagens'      => $mensagens,
            'countMsg'       => $countMsg,
        ]);
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
