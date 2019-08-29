<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table= 'scenarios';
    protected $fillable= ['nom', 'suivi', 'delais'];
}
