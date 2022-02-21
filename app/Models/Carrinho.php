<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Carrinho extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','produto_id', 'quantidade', 'nome', 'descricao', 'imagem', 'preco'];

    public function produto(){
        return Produto::where('id','=',$this->produto_id)->first();
    }
}
