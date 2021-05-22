@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex justify-content-center py-3">
    <div class="container">
        <div class="justify-content-between">
            <!-- Titulo -->
            <h3 class="text-white text-center mt-3">Cadastro de Usuários</h3>

            <!-- Mensagem de erro se existir -->
            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}
                    @endforeach
                </div>
            @endif
            <div class="col-4 m-auto">
                <!-- CSRF Protection evitar ataque de cross-site gerando token-->
                @csrf

                <!--Tabela com os produtos -->
                <table class="table table-light table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($usuarios)> 0)
                            
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td colspan="1">{{$usuario->id}}</td>
                                    <td colspan="1">{{$usuario->name}}</td>
                                    <td colspan="1">{{$usuario->email}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <p>Não existe usuarios</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
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
