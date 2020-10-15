<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'cpf', 'nome', 'senha', 'email' ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [ 'senha' ];
    
    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'administradores';

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
     * Listar usuarios cadastrados pelo administrador.
     */
    public function usuarios(){
        return $this->hasMany('App\Models\Usuario');
    }

    /**
     * Listar materiais cadastrados pelo administrador.
     */
    public function materiais(){
        return $this->hasMany('App\Models\Material');
    }
    
    /**
     * Listar editoras cadastradas pelo administrador.
     */
    public function editoras(){
        return $this->hasMany('App\Models\Editora');
    }
    
    /**
     * Listar autores cadastrados pelo administrador.
     */
    public function autores(){
        return $this->hasMany('App\Models\Autor');
    }
    
    /**
     * Listar exemplares cadastrados pelo administrador.
     */
    public function exemplares(){
        return $this->hasMany('App\Models\Exemplar');
    }
    
    /**
     * Listar emprestimos cadastrados pelo administrador.
     */
    public function emprestimos(){
        return $this->hasMany('App\Models\Emprestimo');
    }
}
