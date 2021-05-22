<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\api\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // Variaveis responsaveis pelas rotas

    // -- Rota privada
    protected $rotaPrivada = '/products';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busca os produtos na tabela pelo model product com ordenação decrescente pelo id
        $produtos = Product::all()->sortByDesc('id');

        // Retorna a view passando os produtos
        return view('products', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorna a view
        return view('createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // A requisicao foi customizada para validar com campo e proteger o sistema
        // Cria o produto na tabela pelo model product com as informacoes da requisicao
        $resp = Product::create([
            'description' => $request->description,
            'price' => $request->price
        ]);

        // Veirifica se a criacao do produto deu certo
        if($resp){
            // Redireciona o usuario para a tela privada
            return redirect($this->rotaPrivada);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busca o produto na tabela pelo model product pelo id 
        $produto = Product::find($id);

        // Retorna a view passando o produto
        return view('showProduct', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // Busca o produto na tabela pelo model product pelo id 
        $produto = Product::find($id);

        // Retorna a view passando o produto
        return view('editProduct', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // Busca o produto na tabela pelo model product pelo id 
        $produto = Product::where(['id'=>$id]);

        // Realiza o update no registro com as informaçoes recebidas da requisicao
        // A requisicao foi customizada para validar com campo e proteger o sistema
        $produto->update([
            'description' => $request->description,
            'price' => $request->price
        ]);

        // Redireciona o usuario para a tela privada
        return redirect($this->rotaPrivada);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Exclui o produto identificando pelo id
        $produtoDel = Product::destroy($id);

        // Verifica se a exclusao foi realizada com sucesso
        $msg = "";
        if($produtoDel){
            $msg = "Sim";
        }else{
            $msg = "Não";
        }

        // Retorna mensagem
        return $msg;
    }
}
