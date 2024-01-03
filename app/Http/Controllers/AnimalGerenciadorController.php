<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalGerenciadorController extends Controller
{
    public function index()
    {
        $animais = Animal::orderBy('anData', 'desc')
                        ->paginate(10);
        return view('logado.gerenciador.animais.index', [
            'animais' => $animais,
        ]);
    }

    // método reativar a postagem
    public function atualizar($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update([
            'anFinalizado' => 0,
        ]);
        return redirect(route('animal-gerenciador.index'));
    }

    public function destroy(Animal $animal)
    {
        Animal::findOrFail($animal->id)->delete();
        return redirect(route('animal-gerenciador.index'));
    }
}
