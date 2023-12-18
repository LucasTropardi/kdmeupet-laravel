<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticatedRoutesController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
}
