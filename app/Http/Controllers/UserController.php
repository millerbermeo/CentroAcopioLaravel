<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try {
        $usuario = User::all();
        return response()->json($usuario, 200);
       } catch (\Exception $e) {
        return response()->json(["mensaje" => "informacion no procesada"]);
       }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre_usuario' => 'required',
                'apellido_usuario' => 'required',
                'identificacion' => 'required',
                'correo' => 'required',
                'password' => 'required',
                'rol' => 'required',
            ]);
    
            $usuario = User::create([
                'nombre_usuario' => $request->nombre_usuario,
                'apellido_usuario' => $request->apellido_usuario,
                'identificacion' => $request->identificacion,
                'correo' => $request->correo,
                'password' => bcrypt( $request->password),
                'rol' => $request->rol
            ]);
    
            return response()->json($usuario, 201);
        } catch (\Exception $e) {
            return response()->json(["mensaje" => "informacion no procesada"]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $usuario = User::find($id);
            return response()->json($usuario);
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
            $usuario = User::finOrFail($id)->update($request->all());
            return response()->json($usuario);
        }  catch (\Exception $e) {
            return response()->json(["mensaje" => "informacion no procesada"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::find($id)->delete();
            return response()->json(['mensaje' => "usuaario eliminado correctamente"]);
        }  catch (\Exception $e) {
            return response()->json(["mensaje" => "informacion no procesada"]);
        }
    }
}
