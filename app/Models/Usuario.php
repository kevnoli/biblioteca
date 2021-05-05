<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory;

    public function getAuthPassword(){
        return $this->senha;
    }
    
    /**
     * Os atributos de atribuição em massa.
     *
     * @var array
     */
    protected $fillable = [ 'cpf', 'telefone', 'senha', 'email', 'endereco_id', 'perfil_id'];

    /**
     * Os atributos escondidos.
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
     * Listar editoras cadastradas pelo usuario.
     */
    public function editoras(){
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
    public function emprestimos_solicitados(){
        return $this->hasMany('App\Models\Emprestimo');
    }

    /**
     * O identificador que será salvo no objeto JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
