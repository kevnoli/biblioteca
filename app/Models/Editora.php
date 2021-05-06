<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'nome', 'usuario_cpf' ];

    /**
     * Listar administrador que cadastrou a editora.
     */
    public function administrador(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /**
     * Listar livros publicados pela editora.
     */
    public function livro(){
        return $this->hasMany('App\Models\Livro');
    }
}
