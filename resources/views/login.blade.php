@extends('templates.layout')

@section('conteudo')
    <div class="form-group d-flex justify-content-center">
        <img src="{{url('assets/img/img_user.png')}}" class="img-thumbnail img-responsive" width="100px" alt="Imagem usuario">
    </div>
    <div class="container">
        <!-- Inicio do formulario de login -->
        <form method="POST" action="" id="formLogin">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 offset-md-3 mt-3">
                    <input type="submit" class="btn btn-primary" value="Entrar" id="botao">
                </div>
            </div>
        </form>
        <!-- Termino do formulario de login -->
    </div>
@endsection
