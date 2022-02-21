<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        return view('categoria.index')->with('categorias', Categoria::all());
    }

    public function create()
    {
        return view('categoria.create');
    }


    public function store(Request $request)
    {
        if ($request->icone) {
            $icone = $request->file('icone')->store('/public/produtos');
            $icone = str_replace('public/', 'storage/', $icone);
        } else {
            $icone = "storage/produtos/imagempadrao.png";
        }

        $categoria = Categoria::create([
            'nome'=>$request->nome,
            'icone'=>$icone
        ]);
        session()->flash('sucesso', 'Novo categoria cadastrado com sucesso');
        return redirect(route('categoria.index'));
    }


    public function show(Categoria $categoria)
    {
        
    }


    public function edit(Categoria $categoria, $id)
    { 
        
        $a = Categoria::where('id', $id)->value('id');
        $b = Categoria::where('id', $id)->value('nome');
        $d = Categoria::where('id', $id)->value('icone');
        $c=[$a,$b,$d];
        
        return view('categoria.edit')->with('c',$c);
    }


    public function update(Request $request, Categoria $categoria, $id)
    {   
        if ($request->icone) {
            $icone = $request->file('icone')->store('/public/produtos');
            $icone = str_replace('public/', 'storage/', $icone);
        } else {
            $icone = Categoria::where('id',$id)->value('icone');
        }
        $categoria = Categoria::where('id',$id)->update([
            'nome'=>$request->nome,
            'icone'=>$icone
        ]);
        session()->flash('sucesso', 'categoria alterado com sucesso');
        return redirect(route('categoria.index'));
        
        
    }


    public function destroy(Categoria $categoria, $id, Request $request)
    {
        $a = Categoria::where('id', $id);

        $a->delete();
        session()->flash('sucesso', 'Categoria apagado com sucesso');
        return redirect(route('categoria.index'));
    }
    public function search4(Request $request)
{
  $search = $request->input('search');
  return view('categoria.index')->with( 'categorias',Categoria::where('nome','LIKE',"%{$search}%")->get());

  
}
}
