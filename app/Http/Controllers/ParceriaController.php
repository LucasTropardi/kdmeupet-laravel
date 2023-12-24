<?php

namespace App\Http\Controllers;

use App\Models\Parceria;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ParceriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only([
            'gerenciador_index',
            'aprovar_parceria',
            'destroy',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcerias = Parceria::where('user_id', Auth::user()->id)->orderBy('parDataCadastro', 'desc')->paginate(10);
        return view('logado.usuario.parcerias.index', [
            'parcerias' => $parcerias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hoje = date('d/m/Y');
        return view('logado.usuario.parcerias.create', [
            'hoje' => $hoje,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parNome'         => 'required|string|max:255|unique:parcerias,parNome',
            'user_id'         => 'required|integer',
            'parDataCadastro' => 'required',
            'parEmail'        => 'required|string|lowercase|email|max:255|unique:parcerias,parEmail',
            'parTelefone'     => 'required|string|max:14',
            'parEndereco'     => 'required|string|max:255',
            'parDescricao'    => 'required|string|max:600',
            'parImagem'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'parMensagem'     => 'required|string|max:600',
            'parDataInicio'   => 'nullable',
            'parDataFim'      => 'nullable',
        ], [
            'parNome.unique'  => 'Parceria já cadastrada',
            'parEmail.unique' => 'E-mail já cadastrada',
        ]);

        $imagem = $request->file('parImagem');
        $nomeImagem = 'parceria_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
        $caminho = $imagem->storeAs('public/uploads/parcerias', $nomeImagem);
        $nomeDaFoto = basename($caminho);

        $dataBruta = $request->parDataCadastro;
        $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

        $parceria = new Parceria();
        $parceria->user_id = $request->user_id;
        $parceria->parDataCadastro = $dataBanco;
        $parceria->parNome = $request->parNome;
        $parceria->parEmail = $request->parEmail;
        $parceria->parTelefone = $request->parTelefone;
        $parceria->parEndereco = $request->parEndereco;
        $parceria->parDescricao = $request->parDescricao;
        $parceria->parImagem = $nomeDaFoto;
        $parceria->parMensagem = $request->parMensagem;

        $parceria->save();
        return redirect(route('parceria.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Parceria $parceria)
    {
        $dataCadastrada = Carbon::parse($parceria->parDataCadastro)->format('d/m/Y');
        return view('logado.usuario.parcerias.show', [
            'parceria'       => $parceria,
            'dataCadastrada' => $dataCadastrada,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parceria $parceria)
    {
        $dataCadastrada = Carbon::parse($parceria->parDataCadastro)->format('d/m/Y');
        return view('logado.usuario.parcerias.edit', [
            'parceria'       => $parceria,
            'dataCadastrada' => $dataCadastrada,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parceria $parceria)
    {
        $request->validate([
            'parNome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('parcerias')->ignore($parceria->id),
            ],
            'parEmail' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('parcerias')->ignore($parceria->id),
            ],
            'user_id'         => 'required|integer',
            'parTelefone'     => 'required|string|max:14',
            'parEndereco'     => 'required|string|max:255',
            'parDescricao'    => 'required|string|max:600',
            'parMensagem'     => 'required|string|max:600',
        ], [
            'parNome.unique'  => 'Parceria já cadastrada.',
            'parEmail.unique' => 'E-mail já cadastrado.'
        ]);

        $camposAtualizar = [
            'parAprovado'   => 0,
            'parFinalizado' => 0,
            'user_id'       => $request->user_id,
            'parNome'       => $request->parNome,
            'parEmail'      => $request->parEmail,
            'parTelefone'   => $request->parTelefone,
            'parEndereco'   => $request->parEndereco,
            'parDescricao'  => $request->parDescricao,
            'parMensagem'   => $request->parMensagem,
        ];

        if ($request->hasFile('parImagem')) {
            $request->validate([
                'parImagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imagem = $request->file('parImagem');
            $nomeImagem = 'parceria_' . md5(uniqid(rand(), true)) . '.' . $imagem->getClientOriginalExtension();
            $caminho = $imagem->storeAs('public/uploads/parcerias', $nomeImagem);
            $nomeDaFoto = basename($caminho);

            $camposAtualizar['parImagem'] = $nomeDaFoto;
        }

        if ($request->parDataCadastro != $parceria->parDataCadastro) {
            $request->validate([
                'parDataCadastro' => 'required',
            ]);

            $dataBruta = $request->parDataCadastro;
            $dataBanco = Carbon::createFromFormat('d/m/Y', $dataBruta)->format('Y-m-d');

            $camposAtualizar['parDataCadastro'] = $dataBanco;
        }

        $parceria->update($camposAtualizar);
        return redirect(route('parceria.ver', ['parceria' => $parceria]));
    }

    public function gerenciador_index()
    {
        $parcerias = Parceria::orderBy('parDataCadastro', 'desc')->paginate(10);
        return view('logado.gerenciador.parcerias.index', [
            'parcerias' => $parcerias,
        ]);
    }

    public function aprovar_parceria($id)
    {
        $parceria = Parceria::findOrFail($id);
        $parceria->update([
            'parAprovado' => 1,
        ]);
        return redirect(route('parceria.gerenciador'));
    }

    public function finalizar_parceria($id)
    {
        $parceria = Parceria::findOrFail($id);
        $parceria->update([
            'parFinalizado' => 1,
        ]);
        return redirect(route('parceria.gerenciador'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parceria = Parceria::findOrFail($id);
        $parceria->delete();
        return redirect(route('parceria.gerenciador'));
    }
}
