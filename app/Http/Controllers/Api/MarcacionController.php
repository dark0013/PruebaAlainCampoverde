<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marcacion;
use App\Models\TblAdmParametros;

use Illuminate\Http\Request;
use Carbon\Carbon;

class MarcacionController extends Controller
{
    public function fnMarcacion(Request $request)
    {
         // Validar la solicitud
    $validated = $request->validate([
        'identificacion' => 'required|string',
        'marca' => 'required|string',
    ]);

    // Crear el nuevo parámetro (aunque esto parece innecesario si solo deseas mostrar la hora)
    // Si lo necesitas, puedes dejar esta parte
    TblAdmParametros::create([
        'identificacion' => $validated['identificacion'],
        'marca' => $validated['marca'],
    ]);

    // Obtener todas las marcaciones con el grupo 'horarios'
    $marcaciones = TblAdmParametros::where('grupo', 'horarios')->get();

    // Hora actual
    $horaActual = Carbon::now();

    // Inicializar variables de horas
    $horaEntrada = null;
    $horaAlmuerzo = null;
    $horaSalida = null;

    // Recorrer las marcaciones para obtener las horas de entrada, almuerzo y salida
    foreach ($marcaciones as $marcacion) {
        if ($marcacion->descripcion == 'Hora de Entrada') {
            $horaEntrada = Carbon::createFromFormat('H:i:s', $marcacion->valor_min);
        }

        if ($marcacion->descripcion == 'Hora de Almuerzo') {
            $horaAlmuerzo = Carbon::createFromFormat('H:i:s', $marcacion->valor_min);
        }

        if ($marcacion->descripcion == 'Hora de Salida') {
            $horaSalida = Carbon::createFromFormat('H:i:s', $marcacion->valor_min);
        }
    }

    // Inicializar resultado
    $resultado = "";

    // Comparar la hora actual con las horas de entrada, almuerzo y salida
    if ($horaActual->greaterThanOrEqualTo($horaSalida) && $horaActual->lessThan($horaEntrada)) {
        $resultado = "SALIDA";
    } elseif ($horaActual->greaterThanOrEqualTo($horaEntrada) && $horaActual->lessThan($horaAlmuerzo)) {
        $resultado = "ENTRADA";
    } elseif ($horaActual->greaterThanOrEqualTo($horaAlmuerzo) && $horaActual->lessThan($horaSalida)) {
        $resultado = "ALMUERZO";
    } else {
        


        $marcacion = Marcacion::create([  
            'identificacion' => $validated['identificacion'],  
            'marca' => $resultado,  
        ]);  

    // Devolver la respuesta en formato JSON
    return response()->json(['estado' => $resultado]);
    }
 }
}

