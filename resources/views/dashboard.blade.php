@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex justify-content-center py-3">
    <div class="container">
        <div class="justify-content-between">
            <!-- Titulo -->
            <h3 class="text-white text-center mt-3">Menu Bashboard</h3>

            <div class="col-8 m-auto">
                <!-- Link/Botao Cadastro Produtos -->
                <div class="text-center mt-3"> 
                    <a class="text-success" href="{{url('/products')}}">
                        <button class="btn btn-light" id="botao_cad_produto">Cadastro de Produtos</button>
                    </a> 
                </div>
                <!-- Link/Botao Cadastro Usuários -->
                <div class="text-center mt-3"> 
                    <a class="text-success" href="{{url('/users')}}">
                        <button class="btn btn-light" id="botao_cad_usuario">Cadastro de Usuários</button>
                    </a> 
                </div>
                
            </div>

            <!-- Link/Botao logout -->
            <div class="text-center mt-3"> 
                <a class="text-success" href="{{url('/app/logout')}}">
                    <button class="btn btn-primary" id="botao_sair">Sair</button>
                </a> 
            </div>
        </div>
    </div>
</section>
@endsection
