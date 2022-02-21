<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    
    public function index()
    {
        return view('tipo.index')->with('tipos',Tipo::all());
    }

    public function create()
    {
        return view('tipo.create');
    }

    
    public function store(Request $request)
    {
        Tipo::create($request->all());
     session()->flash('sucesso','Novo Tipo cadastrado com sucesso');
     return redirect(route('tipo.index'));
    }

    
    public function show(Tipo $tipo)
    {
        //
    }

    
    public function edit(Tipo $tipo)
    {
        return view('tipo.edit')->with('tipo',$tipo);
    }

    
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->update($request->all());
     session()->flash('sucesso','Tipo alterado com sucesso');
     return redirect(route('tipo.index'));
    }

    
    public function destroy(Tipo $tipo)
    {
        if($tipo->produtos()->count()>0){
            session()->flash('sucesso','Você não pode deletar uma tipo que tenha produto');
         return redirect(route('tipo.index'));
        }
        $tipo->delete();
     session()->flash('sucesso','Tipo apagado com sucesso');
     return redirect(route('tipo.index'));
    }

    public function search5(Request $request)
{
  $search = $request->input('search');
  return view('tipo.index')->with( 'tipos',Tipo::where('nome','LIKE',"%{$search}%")->get());

  
}
}
