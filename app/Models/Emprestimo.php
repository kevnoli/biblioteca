<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_emprestimo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'data_emprestimo', 'status', 'usuario_administrador_cpf', 'usuario_cpf' ];

    /**
     * Os valores padrão para os atributos do modelo.
     *
     * @var array
     */
    protected $attributes = [
        'status' => false,
    ];

    /**
     * Listar administrador que cadastrou o emprestimo.
     */
    public function administrador(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /**
     * Listar usuario que solicitou o emprestimo.
     */
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /**
     * Listar itens que compoem o emprestimo.
     */
    public function item(){
        return $this->hasMany('App\Models\ItemEmprestimo');
    }
}
