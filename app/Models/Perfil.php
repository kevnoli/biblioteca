<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'perfis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'max_livro', 'tempo_emprestimo', 'tempo_renovacao', 'descricao', 'max_reserva' ];

    /**
     * Listar usuarios cadastrados no perfil.
     */
    public function usuario(){
        return $this->hasMany('App\Models\Usuario');
    }
}
