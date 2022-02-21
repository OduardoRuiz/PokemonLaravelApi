<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =
    ['nome','quantidade','preco','descricao','imagem','categoria_id','destaque'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function tipos(){
        return $this->belongsToMany(Tipo::class);
    }

}
