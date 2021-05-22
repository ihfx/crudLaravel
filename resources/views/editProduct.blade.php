@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex justify-content-center py-3">
    <div class="container">
        <div class="justify-content-between">
            <!-- Titulo -->
            <h3 class="text-white text-center mt-3">Editar Produto</h3>

            <!-- Mensagem de erro se existir -->
            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>
            @endif

            <!-- Inicio do form de edicao -->
            <div class="col-8 m-auto">
                <form method="POST" action='{{url("/products/$produto->id")}}' id="formEdit">
                    @method('PUT')
                    <!-- Recurso do laravel para requisicoes PUT -->
                    <!-- CSRF Protection evitar ataque de cross-site gerando token-->
                    @csrf
                    <!--Campo descricao -->
                    <div class="form-group d-flex justify-content-center">
                        <div class="col-md-3">
                            <label for="description" class="form-label fw-bold text-white">Descrição</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$produto->description}}">
                        </div>
                    </div>

                    <!--Campo preco -->
                    <div class="form-group d-flex justify-content-center">
                        <div class="col-md-3">
                            <label for="price" class="form-label fw-bold text-white">Preço</label>
                            <input type="numeric" class="form-control" id="price" name="price" value="{{$produto->price}}">
                        </div>
                    </div>

                    <!--Botao editar -->
                    <div class="form-group d-flex justify-content-center">
                        <div class="d-grid gap-2 col-3 mx-auto mt-3">
                            <input type="submit" class="btn btn-success" value="Editar" id="botaoEditar">
                        </div>
                    </div>
                </form>
            </div>
            <!-- Inicio do form de edicao -->
            
            <!-- Link/Botao voltar -->
            <div class="d-grid gap-2 col-3 mx-auto mt-3 justify-content-center">
                <a href="{{url('/products')}}"> 
                    <input type="submit" class="btn btn-primary" value="Voltar" id="botao_voltar">
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
