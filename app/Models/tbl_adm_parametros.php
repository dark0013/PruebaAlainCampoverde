<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_adm_parametros extends Model
{
    use HasFactory;

    protected $fillable = ['idparametros', 'grupo', 'descripcion', 'valor_min','valor_max', 'estado'];

    // Si la tabla no sigue la convención plural, puedes especificarla
    protected $table = 'tbl_adm_parametros';
}
