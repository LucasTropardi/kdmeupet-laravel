<?php

namespace App\Http\Controllers;

use App\Models\Tamanho;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TamanhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logado.gerenciador.tamanhos.index', [
            'tamanhos' => Tamanho::orderByDesc('created_at')->paginate('5'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especies = Especie::pluck('esNome', 'id');

        return view('logado.gerenciador.tamanhos.create', ['especies' => $especies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|integer',
            'especie_id' => 'required|integer',
            'tamanho'    => [
                'required',
                'string',
                'max:255',
                Rule::unique('tamanhos')->where(function ($query) use ($request) {
                    return $query->where('especie_id', $request->especie_id);
                }),
            ],
        ], [
            'tamanho.unique' => 'Tamanho já cadastrado para a espécie.',
        ]);

        $tamanho = new Tamanho();
        $tamanho->especie_id = $request->especie_id;
        $tamanho->user_id = $request->user_id;
        $tamanho->tamanho = $request->tamanho;

        $tamanho->save();
        return redirect(route('tamanho.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tamanho $tamanho)
    {
        return view('logado.gerenciador.tamanhos.show', [
            'tamanho' => $tamanho,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tamanho $tamanho)
    {
        $especies = Especie::pluck('esNome', 'id');
        return view('logado.gerenciador.tamanhos.edit', [
            'tamanho' => $tamanho,
            'especies' => $especies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tamanho $tamanho)
    {
        $request->validate([
            'user_id'    => 'required|integer',
            'especie_id' => 'required|integer',
            'tamanho'    => [
                'required',
                'string',
                'max:255',
                Rule::unique('tamanhos')->where(function ($query) use ($request) {
                    return $query->where('especie_id', $request->especie_id);
                })->ignore($tamanho->id),
            ],
        ], [
            'tamanho.unique' => 'Tamanho já cadastrado para a espécie.',
        ]);

        $tamanho->update([
            'user_id' => $request->user_id,
            'especie_id' => $request->especie_id,
            'tamanho' => $request->tamanho,
        ]);

        return redirect(route('tamanho.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tamanho $tamanho)
    {
        Tamanho::findOrFail($tamanho->id)->delete();
        return redirect(route('tamanho.index'));
    }

    public function confirma_delete_tamanho($id)
    {
        $tamanho = Tamanho::findOrFail($id);
        return view('logado.gerenciador.tamanhos.confirma_delete_tamanho', ['id' => $id, 'tamanho' => $tamanho]);
    }
}
