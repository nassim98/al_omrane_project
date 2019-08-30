<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    protected $table= 'suivis';
    protected $fillable= ['id_document', 'id_scenario', 'id_etape','date'];
}
