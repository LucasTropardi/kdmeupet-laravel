<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('logado.gerenciador.users.index', [
            'users' => DB::table('users')->orderBy('name')->paginate('5'),
        ]);
    }

    public function alterar($id)
    {
        $user = User::findOrFail($id);
        return view('logado.gerenciador.users.alterar', [
            'user' => $user,
        ]);
    }
}
