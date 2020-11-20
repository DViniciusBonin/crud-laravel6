<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'id',
        'logradouro',
        'bairro',
        'numero',
        'cep',
        'created_at',
        'update_at',
        'idClient',
     ];
}
