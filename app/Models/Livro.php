<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'material_id', 'isbn', 'edicao', 'qtd_paginas', 'classificacao', 'editora_id' ];

    /**
     * A chave primaria associada a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'material_id';

    /**
     * Listar editora que publicou o livro.
     */
    public function editora(){
        return $this->belongsTo('App\Models\Editora');
    }
}
