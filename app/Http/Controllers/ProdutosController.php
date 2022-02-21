<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Tipo;
use App\Models\User;

class ProdutosController extends Controller
{
   public function index() {
       return view('produto.index')->with('produtos',Produto::all());
   } 

   public function create() {
    return view('produto.create')->with(['categorias'=>Categoria::all(), 'tipos'=>Tipo::all()]);
} 

public function store(Request $request ) {
    if ($request->imagem) {
        $imagem = $request->file('imagem')->store('/public/produtos');
        $imagem = str_replace('public/', 'storage/', $imagem);
    } else {
        $imagem = "storage/produtos/imagempadrao.png";
    } 
    


    $produto = Produto::create([
        'nome'=>$request->nome,
        'quantidade'=>$request->quantidade,
        'preco'=>$request->preco,
        'descricao'=>$request->descricao,
        'categoria_id'=>$request->categoria_id,
        'destaque'=>$request->destaque,
        'imagem'=>$imagem
    ]);
    $produto->tipos()->sync($request->tipos);
    session()->flash('sucesso','Novo Pokemon cadastrado com sucesso');
    return redirect(route('produto.index'));
} 

public function edit(Produto $produto) {
    return view('produto.edit')->with(['produto'=>$produto, 'categorias'=>Categoria::all(), 'tipos'=> Tipo::all()]);
} 

public function update(Request $request, Produto $produto) {
    if ($request->imagem) {
        $imagem = $request->file('imagem')->store('/public/produtos');
        $imagem = str_replace('public/', 'storage/', $imagem);
        Storage::delete($produto->image);
        if (!$produto->imagem == 'storage/produtos/imagempadrao.png')
            Storage::delete($produto->imagem);
    } else {
        $imagem = $produto->imagem;
    }

    $produto->update([
        'nome'=>$request->nome,
        'quantidade'=>$request->quantidade,
        'preco'=>$request->preco,
        'descricao'=>$request->descricao,
        'categoria_id'=>$request->categoria_id,
        'destaque'=>$request->destaque,
        'imagem'=>$imagem
    ]);
    $produto->tipos()->sync($request->tipos);
    session()->flash('sucesso','Novo Pokemon alterado com sucesso');
    return redirect(route('produto.index'));
} 

public function destroy(Produto $produto) {
    $produto->delete();
    session()->flash('sucesso','Novo Pokemon apagado com sucesso');
    return redirect(route('produto.index'));

} 

public function lixeira(){
    return view('produto.lixeira')->with('produtos',Produto::onlyTrashed()->get());
}

public function restaurar( $id){
    $produto=Produto::onlyTrashed()->where('id',$id)->firstOrfail();

    $produto->restore();
    session()->flash('sucesso','Pokemon restaurado com sucesso');
    return redirect(route('produto.lixeira'));
}

public function show(Produto $produto){
    return view('produto.show')->with(['produto'=>$produto, 'categorias'=>Categoria::all(), 'tipos'=> Tipo::all()]);
}

public function search(Request $request)
{
  $search = $request->input('search');
  return view('produto.index')->with( 'produtos',Produto::where('nome','LIKE',"%{$search}%")->get());

  
}




}
