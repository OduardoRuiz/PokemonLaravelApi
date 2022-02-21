<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function add(Produto $produto)
    {

        $item = Carrinho::where([['produto_id', '=', $produto->id], ['user_id', '=', Auth()->user()->id]])->first();


        if ($item) {
            $item->update([
                'quantidade' => $item->quantidade + 1
            ]);
        } else {



            Carrinho::create([
                'user_id' => Auth()->user()->id,
                'produto_id' => $produto->id,
                'quantidade' => 1,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'descricao' => $produto->descricao,
                'imagem' => $produto->imagem,

            ]);
        }
    }

    public function remove(Produto $produto)
    {

        $item = Carrinho::where([['produto_id', '=', $produto->id], ['user_id', '=', Auth()->user()->id]])->first();


        if ($item->quantidade > 1) {
            $item->update([
                'quantidade' => $item->quantidade - 1


            ]);
        } else {
            $item->delete();
        }
    }

    public function show()
    {

        $carrinho = Carrinho::where('user_id',Auth()->user()->id)->get();

        return response()->json($carrinho);
    }

    //arrumar pedidos add.


    /* 
   **Jeito que nao deu certo** 
  
  public function show()
    {
     
  aqui id do usuario
      $carrinho = Carrinho::select('produto_id')->where('user_id', Auth()->user()->id)->get();
   
  
      foreach ($carrinho as $prod) {
       
        $produto[] =  Produto::select('nome')->where('id', $prod->produto_id)->get();
        
    

    };


      //aqui id do produto que ta no carrinho no lugar do 3
       $b = Produto::select('nome')->where('id', 3)->get();
       // $b[1] = Produto::select('nome')->where('id', 2)->get();
      return response()->json($produto); 
    } **/
}
