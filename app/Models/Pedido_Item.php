<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Item extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id','produto_id','quantidade','preco', 'nome', 'imagem', 'descricao'];
}
