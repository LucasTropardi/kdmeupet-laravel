<?php

namespace App\Http\Controllers;

use App\Models\AdocaoInteresse;
use App\Http\Controllers\Controller;
use App\Models\Adocao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdocaoInteresseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only([
            'index_gerenciador',
            'destroy',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    // interesses para o animal disponível
    public function index($id)
    {
        $adocao = Adocao::findOrFail($id);
        $interesses = AdocaoInteresse::where('adocao_id', $adocao->id)->orderBy('adiDataCadastro', 'desc')->paginate(10);
        return view('logado.usuario.adocoes.interesse.index', [
            'interesses' => $interesses,
        ]);
    }

    public function index_gerenciador()
    {
        $interesses = AdocaoInteresse::orderBy('adiDataCadastro', 'desc')->paginate(10);
        return view('logado.gerenciador.adocoes.interesse.index', [
            'interesses' => $interesses,
        ]);
    }

    public function meus_interesses()
    {
        $interesses = AdocaoInteresse::where('user_id', Auth::user()->id)->orderBy('adiDataCadastro', 'desc')->paginate(10);
        return view('logado.usuario.adocoes.interesse.meus-interesses', [
            'interesses' => $interesses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $adocao = Adocao::findOrFail($id);
        $hoje = date('d/m/Y');
        return view('logado.usuario.adocoes.interesse.create',[
            'hoje'   => $hoje,
            'adocao' => $adocao,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'         => 'required|integer',
            'adocao_id'       => 'required|integer',
            'adiDataCadastro' => 'required',
            'adiContato'      => 'required|string|max:255',
            'adiMensagem'     => 'required|string|max:600',
        ]);

        $dataBruta = $request->adiDataCadastro;
        $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

        $interesse = new AdocaoInteresse();
        $interesse->user_id         = $request->user_id;
        $interesse->adocao_id       = $request->adocao_id;
        $interesse->adiDataCadastro = $dataBanco;
        $interesse->adiContato      = trim($request->adiContato);
        $interesse->adiMensagem     = trim($request->adiMensagem);

        $interesse->save();
        return redirect(route('lista.adocoes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AdocaoInteresse $interesse)
    {
        $dataCadastrada = Carbon::parse($interesse->adiDataCadastro)->format('d/m/Y');
        return view('logado.usuario.adocoes.interesse.show', [
            'interesse'      => $interesse,
            'dataCadastrada' => $dataCadastrada,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdocaoInteresse $interesse)
    {
        $dataCadastrada = Carbon::parse($interesse->adiDataCadastro)->format('d/m/Y');
        return view('logado.usuario.adocoes.interesse.edit', [
            'interesse'      => $interesse,
            'dataCadastrada' => $dataCadastrada,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdocaoInteresse $interesse)
    {
        $request->validate([
            'adiContato'      => 'required|string|max:255',
            'adiMensagem'     => 'required|string|max:600',
        ]);

        $camposAtualizar = [
            'adiContato'  => trim($request->adiContato),
            'adiMensagem' => trim($request->adiMensagem),
        ];

        if ($request->adiDataCadastro != $interesse->adiDataCadastro) {
            $request->validate([
                'adiDataCadastro' => 'required',
            ]);

            $dataBruta = $request->adiDataCadastro;
            $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

            $camposAtualizar['adiDataCadastro'] = $dataBanco;
        }

        $interesse->update($camposAtualizar);
        return redirect(route('adocao.interesse.show', $interesse->id));
    }

    public function finalizar_interesse(AdocaoInteresse $interesse)
    {
        return view('logado.usuario.adocoes.interesse.finalizar', [
            'interesse' => $interesse,
        ]);
    }

    public function finalizar(Request $request, AdocaoInteresse $interesse)
    {
        $request->validate([
            'adiResposta'     => 'required|string|max:600',
        ]);

        $updateFields = [
            'adiFinalizado'   => 1,
            'adiDataResposta' => date('Y/m/d'),
            'adiResposta'     => trim($request->adiResposta),
        ];

        $interesse->update($updateFields);
        return redirect(route('adocao.interesse.show', $interesse->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdocaoInteresse $interesse)
    {
        AdocaoInteresse::findOrFail($interesse->id)->delete();
        return redirect(route('adocao.gerenciador.interesse'));
    }
}
