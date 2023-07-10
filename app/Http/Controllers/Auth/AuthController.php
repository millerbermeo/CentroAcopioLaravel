<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['mensaje' => 'inicio de sesion invalido']);
            }
    
            $usuario = Auth::user();
            $token = $usuario ->createToken('token')->plainTextToken;
    
            $response = [
                'id' => $usuario->id,
                'nombre_usuario' => $usuario->nombre_usuario,
                'apellido_usuario' => $usuario->apellido_usuario,
                'identificacion' => $usuario->identificacion,
                'email' => $usuario->email,
                'api_token' => $token,
                'rol' => $usuario->rol
            ];
    
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e,["mensaje" => "informacion no procesada"], 422);
        }
    }

    public function logout(Request $request) {
        try {
            $usuario = $request->user();
            $usuario->currentAccessToken()->delete();
            return response()->json(["mensaje" => "cierre de session correcto"]);
        } catch (\Exception $e) {
            return response()->json($e,["mensaje" => "informacion no procesada"], 422);
        }
    }
}
