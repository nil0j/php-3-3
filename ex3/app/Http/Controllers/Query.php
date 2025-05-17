<?php

use Illuminate\Support\Facades\DB;

function getDataFromQuery()
{
    $results = DB::table('usuaris as u')
        ->join('comandes as c', 'u.id_usuari', '=', 'c.id_usuari')
        ->select('u.nom', 'c.producte')
        ->get();

    return $results;
}
