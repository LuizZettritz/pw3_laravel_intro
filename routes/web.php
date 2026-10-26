<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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


Routte::get('/lab-seguranca', function (Request $request) {
    $termo = $request->query('busca', '');

    $resultadoVulneravel = [];
    $erroVulneravel = null;
    
    if ($termo !== '') {
        try{
            $resultadoVulneravel = DB::select("SELECT id, name, email FROM
            users WHERE name = '$termo'");
        } catch (\Exception $e) {
            $erroVulneravel = $e->getMessage();
        }
    }
});
