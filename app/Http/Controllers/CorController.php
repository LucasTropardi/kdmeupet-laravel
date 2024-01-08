<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logado.gerenciador.cores.index', [
            'cores' => Cor::orderByDesc('created_at')->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logado.gerenciador.cores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cor'     => 'required|string|max:255|unique:cors,cor',
        ], [
            'cor.unique' => 'Cor já cadastrada'
        ]);

        $cor = new Cor();
        $cor->cor = $request->cor;

        $cor->save();
        return redirect(route('cor.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cor $cor)
    {
        return view('logado.gerenciador.cores.show', [
            'cor' => $cor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cor $cor)
    {
        return view('logado.gerenciador.cores.edit', ['cor' => $cor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cor $cor)
    {
        $request->validate([
            'cor'     => [
                'required',
                'string',
                'max:255',
                Rule::unique('cors')->ignore($cor->id),
            ],
        ], [
            'cor.unique' => 'Cor já cadastrada'
        ]);

        $cor->update([
            'cor' => $request->cor,
        ]);

        return redirect(route('cor.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cor::findOrFail($id)->delete();
        return redirect(route('cor.index'));
    }
}
