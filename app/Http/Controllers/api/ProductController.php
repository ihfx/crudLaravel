<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\api\Product;
use App\Http\Resources\api\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Busca os produtos na tabela pelo model product com ordenação decrescente pelo id
            $produtos = Product::all()->sortByDesc('id');

            // Faz uma coleção dos produtos obtidos utilizando resources
            $produtosResource = ProductResource::collection($produtos);

            // Retorna a coleção de produtos em formato json
            return response()->json($produtosResource);

        } catch (\Exception $e) {
            // Mensagem de retorno
            $msg = ['msg' => $e->getMessage()];

            // Retorna a mensagem em formato json
            return response()->json($msg);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            // A requisicao foi customizada para validar com campo e proteger o sistema
            // Cria o produto na tabela pelo model product com as informacoes da requisicao
            $resp = Product::create([
                'description' => $request->description,
                'price' => $request->price
            ]);

            $msg = [];
            // Veirifica se a criacao do produto deu certo
            if($resp){
                // Mensagem de retorno
                $msg = ['msg' => 'Produto Criado com sucesso!'];
            }else{
                // Mensagem de retorno
                $msg = ['msg' => 'Erro ao criar o produto!'];
            }

            // Retorna a mensagem em formato json
            return response()->json($msg);

        } catch (\Exception $e) {
            // Mensagem de retorno
            $msg = ['msg' => $e->getMessage()];

            // Retorna a mensagem em formato json
            return response()->json($msg);
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
        try {
            // Busca o produto na tabela pelo model product identificando pelo id
            $produto = Product::find($id);

            // Instancia ProductResources
            $produtosResource = new ProductResource($produto);

            // Retorna o produto em formato json
            return response()->json($produtosResource); 

        } catch (\Exception $e) {
            // Mensagem de retorno
            $msg = ['msg' => $e->getMessage()];

            // Retorna a mensagem em formato json
            return response()->json($msg);
        }

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
        try {
            // Busca o produto na tabela pelo model product pelo id 
            $produto = Product::where(['id'=>$id]);

            // Realiza o update no registro com as informaçoes recebidas da requisicao
            // A requisicao foi customizada para validar com campo e proteger o sistema
            $produto->update([
                'description' => $request->description,
                'price' => $request->price
            ]);

            // Mensagem de retorno
            $msg = ['msg' => 'Produto editado com sucesso!'];

            // Retorna a mensagem em formato json
            return response()->json($msg);

        } catch (\Exception $e) {
            // Mensagem de retorno
            $msg = ['msg' => $e->getMessage()];

            // Retorna a mensagem em formato json
            return response()->json($msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Busca o produto na tabela pelo model product pelo id 
            $produto = Product::where(['id'=>$id]);
            // Deleta o produto
            $produto->delete();

            // Mensagem de retorno
            $msg = ['msg' => 'Produto deletado com sucesso!'];

            // Retorna a mensagem em formato json
            return response()->json($msg);

        } catch (\Exception $e) {
            // Mensagem de retorno
            $msg = ['msg' => $e->getMessage()];

            // Retorna a mensagem em formato json
            return response()->json($msg);
        }
    }
}
