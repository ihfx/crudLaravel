<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{ 
    // Variaveis responsaveis pelas rotas

    // -- Rota privada
    protected $rotaPrivada= '/dashboard';

    // -- Rota incial
    protected $rotaInicial = '/';

    public function register(Request $request){
      // Validando as informacoes recebidas da requisicao para protecao do sistema
      $campos = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed'
      ]);

      // Se tudo estiver correto cria o usuario utilizando o model user, realizando a criptografia da senha com bcrypt
      $user = User::create([
        'name' => $campos['name'],
        'email' => $campos['email'],
        'password' => bcrypt($campos['password'])
      ]);

      // Valida se a criacao foi realizada com sucesso
      if($user){
        // Verifica a validacao das credenciais e direciona para a rota privada
        if(Auth::attempt(['email' => $campos['email'], 'password' => $campos['password']])) {
          return redirect()->intended($this->rotaPrivada);
        } 
      }

      // Caso houve algum problema na criacao do usuario redireciona o usuario para a tela inicial
      return redirect($this->rotaInicial);
      
    }

    public function login(Request $request){
      // Validando as informacoes recebidas da requisicao para protecao do sistema
      $campos = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
      ]);
      
      // Verifica a validacao das credenciais e direciona para a rota privada
      if(Auth::attempt(['email' => $campos['email'], 'password' => $campos['password']])) {
        return redirect()->intended($this->rotaPrivada);
      }
      
      // Caso houve algum problema na validacao das credenciais redireciona o usuario para a tela inicial
      return redirect($this->rotaInicial);
    }

    public function logout (Request $request)
    {
      // Encerra a sessao do usuario
      Auth::logout();

      // Redireciona o usuario para a tela inicial
      return redirect($this->rotaInicial);
    }
}
