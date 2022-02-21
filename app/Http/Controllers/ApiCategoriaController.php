<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Tipo;

class ApiCategoriaController extends Controller
{
   
    
    public function search(Produto $produto,$nome)
    {
      $search = $nome;
      $categoria=Categoria::where('nome', $search)->value('id');

      return response()->json(Produto::where('categoria_id', $categoria)->get());
    } 

    public function show() { 

      return response()->json(Categoria::all());
    }
    public function mostraId($id) {
      
      return response()->json(Produto::where('categoria_id', $id)->get());

    }

    
}
