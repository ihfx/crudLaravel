@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex align-items-center justify-content-center py-3">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <!-- Titulo -->
            <h3 class="text-white text-center mt-3">Login</h3>

            <!-- Mensagem de erro se existir -->
            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>
            @endif

            <!-- Inicio do formulario de login -->
            <form method="POST" action="{{url('/app/login')}}" id="formLogin">
                <!-- CSRF Protection evitar ataque de cross-site gerando token-->
                @csrf
                <!--Campo email -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="email" class="form-label fw-bold text-white">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>

                <!--Campo senha -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="senha" class="form-label fw-bold text-white">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>

                <!--Botao entrar -->
                <div class="d-grid gap-2 col-3 mx-auto mt-3">
                    <input type="submit" class="btn btn-primary" value="Entrar" id="botaoLogin">
                </div>
            </form>
            <!-- Termino do formulario de login -->

            <!-- Link registrar-se -->
            <div class="d-grid gap-2 col-3 mx-auto mt-3 mb-3 justify-content-center"> 
                <a class="text-success" href="{{route('register')}}">Registrar-se</a> 
            </div>
            
        </div>
    </div>
</section>
@endsection
