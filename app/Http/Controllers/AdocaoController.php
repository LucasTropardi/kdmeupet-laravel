<?php

namespace App\Http\Controllers;

use App\Models\Adocao;
use App\Http\Controllers\Controller;
use App\Models\AdocaoMensagem;
use App\Models\Cor;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Tamanho;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdocaoController extends Controller
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
    public function index()
    {
        $adocoes = Adocao::where('user_id', Auth::user()->id)->orderBy('adDataCadastro', 'desc')->paginate(10);
        return view('logado.usuario.adocoes.index', [
            'adocoes' => $adocoes,
        ]);
    }

    public function index_gerenciador()
    {
        $adocoes = Adocao::orderBy('adDataCadastro', 'desc')->paginate(10);
        return view('logado.gerenciador.adocoes.index', [
            'adocoes' => $adocoes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hoje = date('d/m/Y');
        $especies  = Especie::pluck('esNome', 'id');
        $racas     = Raca::pluck('racaNome', 'id');
        $cores     = Cor::pluck('cor', 'id');
        $tamanhos  = Tamanho::pluck('tamanho', 'id');

        return view('logado.usuario.adocoes.create', [
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
            'user_id'        => 'required|integer',
            'especie_id'     => 'required|integer',
            'raca_id'        => 'required|integer',
            'cor_id'         => 'required|integer',
            'tamanho_id'     => 'required|integer',
            'adDataCadastro' => 'required',
            'adNome'         => 'required|string|max:255',
            'adIdade'        => 'required|string|max:255',
            'adDescricao'    => 'required|string|max:600',
            'adContato'      => 'required|string|max:200',
            'adEndereco'     => 'nullable|string|max:255',
            'adImagem'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'adComentario'   => 'nullable|string|max:600',
        ]);

        $imagem = $request->file('adImagem');
        $nomeImagem = 'adocao_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
        $caminho = $imagem->storeAs('public/uploads/adocoes', $nomeImagem);
        $nomeDaFoto = basename($caminho);

        $dataBruta = $request->adDataCadastro;
        $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

        $adocao = new Adocao();
        $adocao->user_id        = $request->user_id;
        $adocao->especie_id     = $request->especie_id;
        $adocao->raca_id        = $request->raca_id;
        $adocao->cor_id         = $request->cor_id;
        $adocao->tamanho_id     = $request->tamanho_id;
        $adocao->adDataCadastro = $dataBanco;
        $adocao->adNome         = trim($request->adNome);
        $adocao->adIdade        = trim($request->adIdade);
        $adocao->adDescricao    = trim($request->adDescricao);
        $adocao->adContato      = trim($request->adContato);
        $adocao->adEndereco     = trim($request->adEndereco);
        $adocao->adImagem       = $nomeDaFoto;

        $adocao->save();
        return redirect(route('adocao.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Adocao $adocao)
    {
        $mensagens = AdocaoMensagem::where('adocao_id', $adocao->id)->orderBy('admData', 'desc')->paginate(5);
        $countMsg = AdocaoMensagem::where('adocao_id', $adocao->id)->count();
        $dataCadastrada = Carbon::parse($adocao->adDataCadastro)->format('d/m/Y');
        return view('logado.usuario.adocoes.show', [
            'dataCadastrada' => $dataCadastrada,
            'adocao'         => $adocao,
            'mensagens'      => $mensagens,
            'countMsg'       => $countMsg,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adocao $adocao)
    {
        $especies       = Especie::pluck('esNome', 'id');
        $racas          = Raca::pluck('racaNome', 'id');
        $cores          = Cor::pluck('cor', 'id');
        $tamanhos       = Tamanho::pluck('tamanho', 'id');
        $dataCadastrada = Carbon::parse($adocao->adDataCadastro)->format('d/m/Y');

        return view('logado.usuario.adocoes.edit', [
            'adocao'         => $adocao,
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
    public function update(Request $request, Adocao $adocao)
    {
        $request->validate([
            'especie_id'   => 'required|integer',
            'raca_id'      => 'required|integer',
            'cor_id'       => 'required|integer',
            'tamanho_id'   => 'required|integer',
            'adNome'       => 'required|string|max:255',
            'adIdade'      => 'required|string|max:255',
            'adDescricao'  => 'required|string|max:600',
            'adContato'    => 'required|string|max:255',
            'adEndereco'   => 'required|string|max:255',
            'adComentario' => 'nullable|string|max:600',
        ]);

        $camposAtualizar = [
            'especie_id'   => $request->especie_id,
            'raca_id'      => $request->raca_id,
            'cor_id'       => $request->cor_id,
            'tamanho_id'   => $request->tamanho_id,
            'adNome'       => trim($request->adNome),
            'adIdade'      => trim($request->adIdade),
            'adDescricao'  => trim($request->adDescricao),
            'adContato'    => trim($request->adContato),
            'adEndereco'   => trim($request->adEndereco),
            'adFinalizado' => 0,
            'adComentario' => '',
        ];

        if ($request->hasFile('adImagem')) {
            $request->validate([
                'adImagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagem = $request->file('adImagem');
            $nomeImagem = 'adocao_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
            $caminho = $imagem->storeAs('public/uploads/adocoes', $nomeImagem);
            $nomeDaFoto = basename($caminho);

            $camposAtualizar['adImagem'] = $nomeDaFoto;
        }

        if ($request->adDataCadastro != $adocao->adDataCadastro) {
            $request->validate([
                'adDataCadastro' => 'required',
            ]);

            $dataBruta = $request->adDataCadastro;
            $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

            $camposAtualizar['adDataCadastro'] = $dataBanco;
        }

        $adocao->update($camposAtualizar);
        return redirect(route('adocao.show', $adocao->id));
    }

    public function finalizar_adocao(Adocao $adocao)
    {
        return view('logado.usuario.adocoes.finalizar-adocao', [
            'adocao' => $adocao,
        ]);
    }

    public function finalizar(Request $request, Adocao $adocao)
    {
        $request->validate([
            'adComentario' => 'nullable|string|max:600',
        ]);

        $atualizar = [
            'adComentario' => trim($request->adComentario),
            'adFinalizado' => 1,
        ];

        $adocao->update($atualizar);

        if (Auth::user()->level === 'admin') {
            return redirect(route('adocao.gerenciador'));
        } else {
            return redirect(route('adocao.show', $adocao->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $adocao = Adocao::findOrFail($id);
        $adocao->delete();
        return redirect(route('adocao.gerenciador'));
    }

    // metodo para salvar mensagem
    public function salvar_mensagem(Request $request)
    {

        $request->validate([
            'user_id'     => 'required|integer',
            'adocao_id'   => 'required|integer',
            'admConteudo' => 'required|string|max:600',
        ]);

        $mensagem = new AdocaoMensagem();
        $mensagem->user_id     = $request->user_id;
        $mensagem->adocao_id   = $request->adocao_id;
        $mensagem->admConteudo = trim($request->admConteudo);
        $mensagem->admData     = Carbon::now();

        $mensagem->save();
        return back();
    }

    //atualizar mensagem
    public function atualizar_mensagem(Request $request, AdocaoMensagem $mensagem)
    {
        $request->validate([
            'admConteudo' => 'required|string|max:600',
        ]);

        $mensagem = AdocaoMensagem::findOrFail($request->id);
        $mensagem->admConteudo = trim($request->admConteudo);
        $mensagem->admData     = Carbon::now();

        $mensagem->update();
        return back();
    }

    // excluir mensagem
    public function apagar_mensagem(AdocaoMensagem $mensagem)
    {
        AdocaoMensagem::findOrFail($mensagem->id)->delete();
        return back();
    }
}
