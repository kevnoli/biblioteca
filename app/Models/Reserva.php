<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'data_reserva', 'status', 'usuario_cpf', 'material_id' ];

    /**
     * Listar usuario que solicitou a reserva.
     */
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /**
     * Listar material reservado pelo usuario.
     */
    public function material(){
        return $this->hasOne('App\Models\Material');
    }
}
