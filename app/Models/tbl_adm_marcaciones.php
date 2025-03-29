<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_adm_marcaciones extends Model
{
    use HasFactory;

    protected $fillable = ['idMarcacion', 'marca', 'hora', 'fecha'];

    // Si la tabla no sigue la convención plural, puedes especificarla
    protected $table = 'tbl_adm_marcaciones';
}
