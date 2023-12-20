<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Controllers\Controller;
use App\Models\Cor;
use App\Models\Especie;
use App\Models\Mensagem;
use App\Models\Raca;
use App\Models\Situacao;
use App\Models\Tamanho;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $animais = Animal::where('user_id', $userId)
                        ->orderBy('anData', 'desc')
                        ->paginate(10);
        return view('logado.usuario.animais.index', [
            'animais' => $animais,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $situacoes = Situacao::pluck('situacao', 'id');
        $especies  = Especie::pluck('esNome', 'id');
        $racas     = Raca::pluck('racaNome', 'id');
        $cores     = Cor::pluck('cor', 'id');
        $tamanhos  = Tamanho::pluck('tamanho', 'id');

        $hoje = date('d/m/Y');

        return view('logado.usuario.animais.create', [
            'situacoes' => $situacoes,
            'especies'  => $especies,
            'racas'     => $racas,
            'cores'     => $cores,
            'tamanhos'  => $tamanhos,
            'hoje'      => $hoje,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'      => 'required|integer',
            'situacao_id'  => 'required|integer',
            'especie_id'   => 'required|integer',
            'raca_id'      => 'required|integer',
            'cor_id'       => 'required|integer',
            'tamanho_id'   => 'required|integer',
            'anNome'       => 'required|string|max:255',
            'anDescricao'  => 'required|string|max:400',
            'anFoto'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'anContato'    => 'required|string|max:200',
            'anData'       => 'required',
            'anEndereco'   => 'nullable|string|max:255',
            'latitude'     => 'required|string|max:255',
            'longitude'    => 'required|string|max:255',
            'anFinalizado' => 'required|integer',
        ]);

        $imagem = $request->file('anFoto');
        $nomeImagem = 'animal_' . time() . '.' . $imagem->getClientOriginalExtension();
        $caminho = $imagem->storeAs('public/uploads/animais', $nomeImagem);
        $nomeDaFoto = basename($caminho);

        $dataBruta = $request->anData;
        $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

        $animal = new Animal();
        $animal->user_id      = $request->user_id;
        $animal->situacao_id  = $request->situacao_id;
        $animal->especie_id   = $request->especie_id;
        $animal->raca_id      = $request->raca_id;
        $animal->cor_id       = $request->cor_id;
        $animal->tamanho_id   = $request->tamanho_id;
        $animal->anNome       = $request->anNome;
        $animal->anDescricao  = $request->anDescricao;
        $animal->anFoto       = $nomeDaFoto;
        $animal->anContato    = $request->anContato;
        $animal->anData       = $dataBanco;
        $animal->anEndereco   = $request->anEndereco;
        $animal->latitude     = $request->latitude;
        $animal->longitude    = $request->longitude;
        $animal->anFinalizado = intval($request->anFinalizado);

        $animal->save();
        return redirect(route('animal.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        $mensagens = Mensagem::where('animal_id', $animal->id)->orderBy('dataMensagem', 'desc')->paginate(5);
        $countMsg = Mensagem::where('animal_id', $animal->id)->count();
        $dataCadastrada = Carbon::parse($animal->anData)->format('d/m/Y');
        return view('logado.usuario.animais.show', [
            'animal'         => $animal,
            'dataCadastrada' => $dataCadastrada,
            'mensagens'      => $mensagens,
            'countMsg'       => $countMsg,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $situacoes      = Situacao::pluck('situacao', 'id');
        $especies       = Especie::pluck('esNome', 'id');
        $racas          = Raca::pluck('racaNome', 'id');
        $cores          = Cor::pluck('cor', 'id');
        $tamanhos       = Tamanho::pluck('tamanho', 'id');
        $dataCadastrada = Carbon::parse($animal->anData)->format('d/m/Y');

        return view('logado.usuario.animais.edit', [
            'animal'         => $animal,
            'situacoes'      => $situacoes,
            'especies'       => $especies,
            'racas'          => $racas,
            'cores'          => $cores,
            'tamanhos'       => $tamanhos,
            'dataCadastrada' => $dataCadastrada,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'user_id'      => 'required|integer',
            'situacao_id'  => 'required|integer',
            'especie_id'   => 'required|integer',
            'raca_id'      => 'required|integer',
            'cor_id'       => 'required|integer',
            'tamanho_id'   => 'required|integer',
            'anNome'       => 'required|string|max:255',
            'anDescricao'  => 'required|string|max:400',
            'anContato'    => 'required|string|max:200',
            'anData'       => 'required',
        ]);

        $camposAtualizar = [
            'situacao_id' => $request->situacao_id,
            'especie_id'  => $request->especie_id,
            'raca_id'     => $request->raca_id,
            'cor_id'      => $request->cor_id,
            'tamanho_id'  => $request->tamanho_id,
            'anNome'      => $request->anNome,
            'anDescricao' => $request->anDescricao,
            'anContato'   => $request->anContato,
        ];

        if ($request->hasFile('anFoto')) {
            $request->validate([
                'anFoto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagem = $request->file('anFoto');
            $nomeImagem = 'animal_' . time() . '.' . $imagem->getClientOriginalExtension();
            $caminho = $imagem->storeAs('public/uploads/animais', $nomeImagem);
            $nomeDaFoto = basename($caminho);

            $camposAtualizar['anFoto'] = $nomeDaFoto;
        }

        if ($request->anData != $animal->anData) {
            $request->validate([
                'anData' => 'required',
            ]);

            $dataBruta = $request->anData;
            $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

            $camposAtualizar['anData'] = $dataBanco;
        }

        if ($request->latitude !== null && $request->longitude !== null) {
            $request->validate([
                'latitude'     => 'required|string|max:255',
                'longitude'    => 'required|string|max:255',
            ]);
            $camposAtualizar = [
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
            ];
        }

        $animal->update($camposAtualizar);

        return redirect(route('animal.show', ['animal' => $animal]));
    }

    // metodo para salvar mensagem
    public function salvar_mensagem(Request $request)
    {

        $request->validate([
            'user_id'          => 'required|integer',
            'animal_id'        => 'required|integer',
            'conteudoMensagem' => 'required|string|max:600',
        ]);

        $mensagem = new Mensagem();
        $mensagem->user_id          = $request->user_id;
        $mensagem->animal_id        = $request->animal_id;
        $mensagem->conteudoMensagem = $request->conteudoMensagem;
        $mensagem->dataMensagem     = Carbon::now();

        $mensagem->save();
        Session::flash('success', 'Mensagem salva com sucesso!');
        return back();
    }

    // método finalizar a postagem
    public function atualizar($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update([
            'anFinalizado' => 1,
        ]);
        return redirect(route('animal.index'));
    }

    public function buscarRacas(Request $request)
    {
        $especieId = $request->input('especie_id');

        $racas = Raca::where('especie_id', $especieId)->get();

        return response()->json(['racas' => $racas]);
    }

    public function buscarTamanhos(Request $request)
    {
        $especieId = $request->input('especie_id');

        $tamanhos = Tamanho::where('especie_id', $especieId)->get();

        return response()->json(['tamanhos' => $tamanhos]);
    }
}
