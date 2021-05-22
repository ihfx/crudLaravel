@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex align-items-center justify-content-center py-3">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <!-- Titulo -->
            <h3 class="text-white text-center">Registrar-se</h3>

            <!-- Mensagem de erro se existir -->
            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>
            @endif

            <!-- Inicio do formulario de registrar-se-->
            <form method="POST" action="{{url('/app/register')}}" id="form_register" name="form_register">
                <!-- CSRF Protection evitar ataque de cross-site gerando token-->
                @csrf

                <!--Campo nome -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="nome" class="form-label fw-bold text-white">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>

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

                <!--Campo confirmar senha -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="conf_senha" class="form-label fw-bold text-white">Confirmar senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>

                <!--Botao registrar -->
                <div class="d-grid gap-2 col-3 mx-auto mt-3">
                    <input type="submit" class="btn btn-success" value="Registrar" id="botao_registrar">
                </div>
            </form>
            <!-- Termino do formulario de registrar-se -->

            <!-- Link/Botao voltar -->
            <div class="d-grid gap-2 col-3 mx-auto mt-3 justify-content-center">
                <a href="{{url('/')}}"> 
                    <input type="submit" class="btn btn-primary" value="Voltar" id="botao_voltar">
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
