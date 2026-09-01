<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $dadosValidados = $request->Validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|Unique:users,email',
            "password" => 'required|min:6'
        ]);


      User::create($dadosValidados);

      return redirect('/admin')->with('sucesso', 'Usuário cadastrado com sucesso');
    }
}
