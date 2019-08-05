<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table= 'etape';
    protected $fillable= ['nom_etape', 'date_reception', 'date_envoie', 'id_document'];
}
