<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logado.gerenciador.especies.index', [
            'especies' => Especie::orderByDesc('created_at')->paginate('5'),
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
        Especie::findOrFail($especie->id)->update($request->all());
        return redirect(route('especie.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especie $especie)
    {
        Especie::findOrFail($especie->id)->delete();
        return redirect(route('especie.index'));
    }

    public function confirma_delete_especie($id)
    {
        $especie = Especie::findOrFail($id);
        return view('logado.gerenciador.especies.confirma_delete_especie', ['id' => $id, 'especie' => $especie]);
    }
}
