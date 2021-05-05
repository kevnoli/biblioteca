<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'material_id', 'numero' ];
    
    /**
     * A chave primaria associada a tabela.
     *
     * @var string
     */
    protected $primaryKey = 'material_id';
    
    /**
     * Listar material da revista.
     */
    public function material(){
        return $this->belongsTo('App\Models\Material');
    }
}
