<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'razaoSocial',
        'cnpj',
        'created_at',
        'updated_at',
     ];

    
}
