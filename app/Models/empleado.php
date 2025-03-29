<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;

    protected $fillable = ['idEmpleado','identificacion', 'nombre', 'apellido'];

    // Si la tabla no sigue la convención plural, puedes especificarla
    protected $table = 'tbl_empleados';
    

}
