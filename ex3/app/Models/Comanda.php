<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $fillable = [
        'usuari_id',
        'producte',
        'preu',
    ];
}
