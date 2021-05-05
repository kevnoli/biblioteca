<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'titulo', 'local', 'ano_publicacao', 'local_publicacao', 'tipo', 'usuario_cpf'];

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'materiais';

    /**
     * Listar administrador que cadastrou o material.
     */
    public function administrador()
    {
        return $this->belongsTo('App\Models\Usuario', 'usuario_cpf');
    }

    /**
     * Listar reserva do material.
     */
    public function reserva()
    {
        return $this->belongsTo('App\Models\Reserva');
    }

    /**
     * Listar exemplares do material.
     */
    public function exemplares()
    {
        return $this->hasMany('App\Models\Exemplar');
    }
    
    /**
     * Listar exemplares do material.
     */
    public function livros()
    {
        return $this->hasMany('App\Models\Livro');
    }

    /**
     * Listar exemplares do material.
     */
    public function revistas()
    {
        return $this->hasMany('App\Models\Revista');
    }

    /**
     * Listar exemplares do material.
     */
    public function outros()
    {
        return $this->hasMany('App\Models\Outros');
    }

    /**
     * Listar exemplares do material.
     */
    public function autor()
    {
        return $this->belongsToMany('App\Models\Autor', 'materiais_autores');
    }
}