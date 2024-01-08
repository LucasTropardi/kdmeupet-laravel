<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('logado.gerenciador.users.index', [
            'users' => DB::table('users')->orderBy('name')->paginate('10'),
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('logado.gerenciador.users.edit', [
            'user' => $user,
        ]);
    }

    public function edit_profile($id)
    {
        $user = User::findOrFail($id);
        return view('logado.gerenciador.users.edit-profile', [
            'user' => $user,
        ]);
    }

    public function update_profile(Request $request, User $user)
    {
        $request->validate([
            'email'     => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'name'     => ['required', 'string', 'max:155'],
            'lastName' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:255'],
            'level'    => ['required', 'string', 'in:admin,user'],
        ], [
            'email.unique' => 'E-mail já cadastrado'
        ]);

        $camposAtualizar = [
            'name'     => $request->name,
            'lastName' => $request->lastName,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'email'    => $request->email,
            'level'    => $request->level,
        ];

        $user->update($camposAtualizar);
        return redirect(route('user.index'));
    }

    public function update(Request $id)
    {
        User::findOrFail($id->id)->update($id->all());
        return redirect(route('user.index'));
    }

    public function profile_destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('user.index'));
    }
}
