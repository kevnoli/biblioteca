<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'tombo', 'numero', 'valor_aquisicao', 'consulta', 'material_id', 'usuario_cpf' ];
    
    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'exemplares';

    /**
     * A chave primaria associada a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'tombo';

    /**
     * Os valores padrão para os atributos do modelo.
     *
     * @var array
     */
    protected $attributes = [
        'consulta' => false,
    ];

    /**
     * Listar administrador que cadastrou o exemplar.
     */
    public function administrador(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /**
     * Listar o material do exemplar.
     */
    public function material(){
        return $this->belongsTo('App\Models\Material');
    }

    /**
     * Listar os emprestimos deste exemplar.
     */
    public function emprestimo(){
        return $this->belongsToMany('App\Models\Emprestimo', 'itens_emprestimo', 'emprestimo_id', 'exemplar_tombo');
    }
}
