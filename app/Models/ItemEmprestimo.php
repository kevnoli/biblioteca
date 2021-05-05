<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEmprestimo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'emprestimo_id', 'exemplar_tombo' ];

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'itens_emprestimo';

    /**
     * Listar emprestimo do item.
     */
    public function emprestimo(){
        return $this->belongsTo('App\Models\Emprestimo');
    }

    /**
     * Listar exemplar solicitado no item.
     */
    public function exemplar(){
        return $this->hasOne('App\Models\Exemplar', 'exemplar_tombo');
    }
}
