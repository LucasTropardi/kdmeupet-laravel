<?php

namespace App\Http\Controllers;

use App\Models\Situacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SituacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logado.gerenciador.situacoes.index', [
            'situacoes' => Situacao::orderByDesc('created_at')->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logado.gerenciador.situacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'situacao'   => 'required|string|max:255|unique:situacaos,situacao',
        ], [
            'situacao.unique' => 'Situação já cadastrada',
        ]);

        $situacao = new Situacao();
        $situacao->user_id = $request->user_id;
        $situacao->situacao = $request->situacao;

        $situacao->save();
        return redirect(route('situacao.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Situacao $situacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Situacao $situacao)
    {
        return view('logado.gerenciador.situacoes.edit', ['situacao' => $situacao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Situacao $situacao)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'situacao'  => [
                'required',
                'string',
                'max:255',
                Rule::unique('situacaos')->ignore($situacao->id),
            ],
        ], [
            'situacao.unique' => 'Situação já cadastrada.'
        ]);

        $situacao->update([
            'user_id' => $request->user_id,
            'situacao'  => $request->situacao,
        ]);

        return redirect(route('situacao.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Situacao::findOrFail($id)->delete();
        return redirect(route('situacao.index'));
    }
}
