@extends('templates.layout')

@section('conteudo')
<section class="min-vh-100 d-flex justify-content-center py-3">
    <div class="container">
        <div class="justify-content-between">
            <!-- Titulo -->
            <h3 class="text-white text-center mt-3">Visualizar Produto</h3>

            <div class="col-8 m-auto">
                <!-- Campo id -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="id" class="form-label fw-bold text-white">Código</label>
                        <p class="form-control" id="id" name="id">{{$produto->id}}</p>
                    </div>
                </div>
                <!-- Campo descricao -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="description" class="form-label fw-bold text-white">Descrição</label>
                        <p class="form-control" id="description" name="description">{{$produto->description}}</p>
                    </div>
                </div>
                <!-- Campo preco -->
                <div class="form-group d-flex justify-content-center">
                    <div class="col-md-3">
                        <label for="price" class="form-label fw-bold text-white">Preço</label>
                        <p class="form-control" id="price" name="price">R$ {{$produto->price}}</p>
                    </div>
                </div>
            </div>
            
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
