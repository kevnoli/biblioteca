<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'max_livro', 'tempo_emprestimo', 'tempo_renovacao', 'descricao', 'max_reserva' ];

    /**
     * Listar usuarios que cadastrados no perfil.
     */
    public function usuarios(){
        return $this->hasMany('App\Models\Usuario');
    }
}
