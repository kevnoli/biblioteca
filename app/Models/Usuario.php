<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'cpf', 'telefone', 'senha', 'email', 'endereco_id', 'perfil_id'];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [ 'senha' ];

    /**
     * A chave primaria associada a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'cpf';

    /**
     * Indica se o ID auto incrementa.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * O tipo do ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Listar endereco do usuario.
     */
    public function endereco(){
        return $this->hasOne('App\Models\Endereco');
    }

    /**
     * Listar o perfil do usuario.
     */
    public function perfil(){
        return $this->belongsTo('App\Models\Perfil');
    }

    /**
     * Listar reservas solicitadas pelo usuario.
     */
    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }

    /**
     * Listar emprestimos realizados pelo usuario.
     */
    public function emprestimos(){
        return $this->hasMany('App\Models\Emprestimo');
    }
}
