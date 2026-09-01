<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/teste-orm', function(){
    User::create([
        'name' => 'Luiz Augusto Domingues Zettritz',
        'email' => 'luiz.zettritz@escola.sp.gov.br',
        'password' => '12345678',
    ]);

    return User::all();
});
