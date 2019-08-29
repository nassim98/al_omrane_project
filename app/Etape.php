<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table= 'etapes';
    protected $fillable= ['libelle', 'description'];
}
