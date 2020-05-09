<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    /**
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_de_nascimento', 'sexo',
    ];
}
