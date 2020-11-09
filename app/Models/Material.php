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
    protected $fillable = [ 'id', 'titulo', 'local', 'ano_publicacao', 'local_publicacao', 'tipo', 'usuario_cpf' ];

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'materiais';

    /**
     * Listar administrador que cadastrou o material.
     */
    public function administrador(){
        return $this->belongsTo('App\Models\usuario');
    }

    /**
     * Listar reserva do material.
     */
    public function reserva(){
        return $this->belongsTo('App\Models\Reserva');
    }

    /**
     * Listar exemplares do material.
     */
    public function exemplares(){
        return $this->hasMany('App\Models\Exemplar');
    }
}
