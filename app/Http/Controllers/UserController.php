<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('logado.gerenciador.users.index', [
            'users' => DB::table('users')->orderBy('name')->paginate('5'),
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('logado.gerenciador.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $id)
    {
        User::findOrFail($id->id)->update($id->all());
        return redirect(route('user.index'));
    }
}
