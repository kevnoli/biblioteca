<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'nome', 'sobrenome', 'administrador_cpf' ];

    /**
    * A tabela associada ao modelo.
    *
    * @var string
    */
   protected $table = 'autores';

   /**
     * Listar administrador que cadastrou o autor.
     */
    public function administrador(){
        return $this->belongsTo('App\Models\Administrador');
    }
}
