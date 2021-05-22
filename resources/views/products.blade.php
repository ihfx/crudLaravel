@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex justify-content-center py-3">
    <div class="container">
        <div class="justify-content-between">
            <!-- Titulo -->
            <h3 class="text-white text-center mt-3">Cadastro de Produtos</h3>

            <!-- Mensagem de erro se existir -->
            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}
                    @endforeach
                </div>
            @endif
            <div class="col-8 m-auto">
                <!-- CSRF Protection evitar ataque de cross-site gerando token-->
                @csrf

                <!--Tabela com os produtos -->
                <table class="table table-light table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($produtos)> 0)
                            
                            @foreach($produtos as $produto)
                                <tr>
                                    <td colspan="1">{{$produto->id}}</td>
                                    <td colspan="1">{{$produto->description}}</td>
                                    <td colspan="1">R$ {{$produto->price}}</td>
                                    <td>
                                        <a href='{{url("/products/$produto->id")}}'>
                                            <button class="btn btn-dark">Visualizar</button>
                                        </a>
                                        <a href='{{url("/products/$produto->id/edit")}}'>
                                            <button class="btn btn-warning">Editar</button>
                                        </a>
                                        <a href='{{url("/products/$produto->id")}}' class="js-deletar">
                                            <button class="btn btn-danger">Deletar</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <p>Não existe produtos</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- Link/Botao Cadastrar -->
            <div class="text-center">
                <a href="{{url('/products/create')}}">
                    <button class="btn btn-success">Cadastrar</button>
                </a>
            </div>

            <!-- Link/Botao Voltar -->
            <div class="text-center mt-3"> 
                <a class="text-success" href="{{url('/dashboard')}}">
                    <button class="btn btn-primary" id="botao_voltar">Voltar</button>
                </a> 
            </div>
        </div>
    </div>
</section>
@endsection
