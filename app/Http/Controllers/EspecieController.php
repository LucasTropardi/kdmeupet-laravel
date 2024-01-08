<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logado.gerenciador.especies.index', [
            'especies' => Especie::orderByDesc('created_at')->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logado.gerenciador.especies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'esNome'  => 'required|string|max:255|unique:especies,esNome',
        ], [
            'esNome.unique' => 'Espécie já cadastrada.'
        ]);

        $especie = new Especie();
        $especie->user_id = $request->user_id;
        $especie->esNome = $request->esNome;

        $especie->save();
        return redirect(route('especie.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Especie $especie)
    {
        return view('logado.gerenciador.especies.show', [
            'especie' => $especie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especie $especie)
    {
        return view('logado.gerenciador.especies.edit', ['especie' => $especie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especie $especie)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'esNome'  => [
                'required',
                'string',
                'max:255',
                Rule::unique('especies')->ignore($especie->id),
            ],
        ], [
            'esNome.unique' => 'Espécie já cadastrada.'
        ]);

        $especie->update([
            'user_id' => $request->user_id,
            'esNome'  => $request->esNome,
        ]);

        return redirect(route('especie.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Especie::findOrFail($id)->delete();
        return redirect(route('especie.index'));
    }
}
