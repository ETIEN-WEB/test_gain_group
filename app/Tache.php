<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'status',
        'etat',

    ];



}
