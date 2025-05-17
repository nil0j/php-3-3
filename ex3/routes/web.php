<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $results = DB::table('usuaris')
        ->join('comandas', 'usuaris.id', '=', 'comandas.usuari_id')
        ->select('usuaris.nom', 'comandas.producte')
        ->get();

    return view('welcome', ['data' => $results]);
});
