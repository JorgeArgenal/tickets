<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';
    protected $primaryKey = 'idTicket';
    public $timestamps = false;

    protected $fillable = [
        'fechaCreacion',
        'Region',
        'Oficina',
        'Usuario',
        'idEquipo',
        'TipoEquipo',
        'Marca',
        'Modelo',
        'NoSerie',
        'Color',
        'Caracteristicas',
        'FechaEnvio',
        'Problema',
        'estado',
    ];

    protected $dates = [
        'fechaCreacion',
        'FechaEnvio',
    ];
}
