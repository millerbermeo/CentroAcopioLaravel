<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residuo;
class CountController extends Controller
{
public function actCantidad(Request $request, $numero, $id) {
    if ($numero > 0) {
        // Sumar el número a la cantidad del residuo en la tabla
        $residuo = Residuo::find($id);
        $residuo->cantidad_residuo += $numero;
        $residuo->save();

        return response()->json($residuo);
    } elseif ($numero < 0) {
        // Restar el número a la cantidad del residuo en la tabla
        $residuo = Residuo::find($id);
        $residuo->cantidad_residuo -= abs($numero);
        $residuo->save();
        return response()->json($residuo);
    }
}

}

