<?php

namespace App\Http\Controllers;

use App\Models\Raca;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logado.gerenciador.racas.index', [
            'racas' => Raca::orderByDesc('created_at')->paginate('5'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especies = Especie::pluck('esNome', 'id');

        return view('logado.gerenciador.racas.create', ['especies' => $especies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|integer',
            'especie_id' => 'required|integer',
            'racaNome'    => [
                'required',
                'string',
                'max:255',
                Rule::unique('racas')->where(function ($query) use ($request) {
                    return $query->where('especie_id', $request->especie_id);
                }),
            ],
        ], [
            'racaNome.unique' => 'Raça já cadastrada.',
        ]);

        $raca = new Raca();
        $raca->especie_id = $request->especie_id;
        $raca->user_id    = $request->user_id;
        $raca->racaNome   = $request->racaNome;

        $raca->save();
        return redirect(route('raca.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Raca $raca)
    {
        return view('logado.gerenciador.racas.show', [
            'raca' => $raca,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Raca $raca)
    {
        $especies = Especie::pluck('esNome', 'id');
        return view('logado.gerenciador.racas.edit', [
            'raca'     => $raca,
            'especies' => $especies,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Raca $raca)
    {
        $request->validate([
            'user_id'    => 'required|integer',
            'especie_id' => 'required|integer',
            'racaNome'   => [
                'required',
                'string',
                'max:255',
                Rule::unique('racas')->where(function ($query) use ($request) {
                    return $query->where('especie_id', $request->especie_id);
                })->ignore($raca->id),
            ],
        ], [
            'racaNome.unique' => 'Raça já cadastrada.',
        ]);

        $raca->update([
            'user_id'    => $request->user_id,
            'especie_id' => $request->especie_id,
            'racaNome'   => $request->racaNome,
        ]);

        return redirect(route('raca.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raca $raca)
    {
        Raca::findOrFail($raca->id)->delete();
        return redirect(route('raca.index'));
    }

    public function confirma_delete_raca($id)
    {
        $raca = Raca::findOrFail($id);
        return view('logado.gerenciador.racas.confirma_delete_raca', ['id' => $id, 'raca' => $raca]);
    }
}
