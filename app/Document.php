<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'num_ordre', 'date', 'chef_responsable','agence','ville','objet','type',
    ];
}
