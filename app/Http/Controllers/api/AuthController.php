<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
      $campos = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed'
      ]);

      $user = User::create([
        'name' => $campos['name'],
        'email' => $campos['email'],
        'password' => bcrypt($campos['password'])
      ]);

      $token = $user->createToken($campos['name'])->plainTextToken;

      $response = [
        'user' => $user,
        'token' => $token
      ];

      return response($response, 201);
    }

    public function login(Request $request){
      $campos = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
      ]);

      // Verificacao do email
      $user = User::where('email', $campos['email'])->first();

      // Verificacao do password
      if(!$user || !Hash::check($campos['password'], $user->password)){
        return response([
          'message' => 'Credenciais Erradas'
        ], 401);
      }

      $token = $user->createToken('myToken')->plainTextToken;

      $response = [
        'user' => $user,
        'token' => $token
      ];

      return response($response, 201);
    }

    public function logout (Request $request)
    {
      auth()->user()->tokens()->delete();

      return [
        'message' => 'Saiu'
      ];
    }
}
