<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'logradouro', 'numero', 'complemento', 'bairro', 'cep', 'cidade', 'uf' ];

    /**
     * Listar o usuario do endereco.
     */
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
