<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residuo;

class ResiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residuo = Residuo::all();
        return response()->json($residuo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {
        $request -> validate([
            'nombre_residuo' => 'required',
            'tipo_residuo' => 'required',
            'cantidad_residuo' => 'required',
            'descripcion_residuo' => 'required',
            'deposito' => 'required',
            'area' => 'required',
        ]);

        $residuo = Residuo::create([
            'nombre_residuo' => $request->nombre_residuo,
            'tipo_residuo' => $request->tipo_residuo,
            'cantidad_residuo' => $request->cantidad_residuo,
            'descripcion_residuo' => $request->descripcion_residuo,
            'deposito' => $request->deposito,
            'area' => $request->area,
        ]);

        return response()->json($residuo);
       } catch (\Exception $e) {
        return response()->json($e, 422);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $residuo = Residuo::find($id);
        return response()->json($residuo);
        } catch (\Exception $e) {
            return response()->json(["mensaje" => "informacion no procesada"]);
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $residuo = Residuo::findOrFail($id)->update($request->all());
        return response()->json($residuo);
        } catch (\Exception $e) {
            return response()->json(["mensaje" => "informacion no procesada"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
           Residuo::find($id)->delete();
           return response()->json(["mensaje" => "informacion Eliminada"]);
        } catch (\Exception $e) {
            return response()->json(["mensaje" => "informacion no procesada"]);
        }
    }
}
