<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Pedido_Item;
use App\Models\User;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class ApiPedidosController extends Controller
{
    public function add(Request $request){

        $carrinho = Carrinho::where('user_id', '=',Auth()->user()->id)->get();
        $endereco = Endereco::where('user_id','=',Auth()->user()->id)->value('id');


        $pedido=Pedido::create([
            'user_id' => Auth()->user()->id,
            'endereco_id' => $endereco,
            'status' => 'Pedido realizado'
        ]);
       


        foreach($carrinho as $item){

            $produto = Produto::where('id', $item->produto_id,)->first();

            Pedido_Item::create([
                
                'pedido_id'=> $pedido->id,
                'produto_id'=> $item->produto_id,
                'quantidade'=> $item->quantidade,
                'nome'=> $produto->nome,
                'imagem'=> $produto->imagem,
                'descricao'=> $produto->descricao,
                'preco'=> $item->produto()->preco

            ]);
            $quantidade = Produto::where('id', $item->produto_id)->value('quantidade');
            $menos =$item->quantidade;
            $novaQuantidade= $quantidade - $menos;

            Produto::where('id', $item->produto_id)->update(['quantidade'=>$novaQuantidade]);

            if ($novaQuantidade==0) {
                Produto::where('id', $item->produto_id)->delete();
            }

            
            $item->delete();


            
        }
        return response()->json(['Pedido' => 'Realizado']);
    }

    public function pedidos(){

        return view('pedido.pedidos')->with(['pedidos'=>Pedido::all(), 'nomes'=>User::all()]);
    
    }

    public function editarStatus($id){
         
        $id = Pedido::where('id', $id)->value('id');
        $user_id = Pedido::where('id', $id)->value('user_id');
        $endereco_id = Pedido::where('id', $id)->value('endereco_id');
        $status = Pedido::where('id', $id)->value('status');
        $tudo = [$id,$user_id,$endereco_id,$status];
        return view('pedido.editarStatus')->with('tudo',$tudo);
    
    }

    public function updaterStatus(Request $request,$id){


        Pedido::where('id',$id)->update(['status'=>$request->status]);
        session()->flash('sucesso', 'Status alterado');
        return redirect(route('usuario.usuarios'));
    
    }

    public function item($id){

    
        return view('pedido.item')->with(['itens'=>Pedido_Item::where('pedido_id', $id)->get()]);
    
    }
    public function show(){

        
        return response()->json(Pedido::where('user_id', Auth()->user()->id)->get());
        
    
    }

    public function showProdutos($id){ 

        return response()->json(Pedido_Item::where('pedido_id', $id)->get());
    }

    public function search3(Request $request)
{
  $search = $request->input('search');
  return view('pedido.pedidos')->with([ 'pedidos'=>Pedido::where('id','LIKE',"%{$search}%")->get(),'nomes'=>User::all()]);

}
public function ultimo(){

        
    return response()->json(Pedido::where('user_id', Auth()->user()->id)->orderBy('id','DESC')->get());
    

}

    
}
