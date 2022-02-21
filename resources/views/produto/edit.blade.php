<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar um Produto</title>
</head>

<body>
    @include('layouts.menu')
    <h1 class="h1CriarProd">Editar produtos</h1>

    <form action="{{Route('produto.update',$produto->id)}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div class="row">
            <label for="" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{$produto->nome}}">
        </div>
        
        <div class="row">
            <label for="" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" min="0" max="100" value="{{$produto->quantidade}}">
        </div>

      
        <div class="row">
            <label for="" class="form-label" >Preço</label>
            <input type="number" class="form-control" name="preco" min="0.00" max="10000.00" value="{{$produto->preco}}">
        </div>
    
        <div class="row">
            <label for="" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" value="{{$produto->descricao}}">
        </div>


        <div class="row">
            <span class="form-label">Categoria</span>

            <select class="form-select" name="categoria_id" id="">
                @foreach($categorias as $categoria)

                <option value="{{$categoria->id}}" @if($categoria->id == $produto->categoria_id) selected @endif >{{$categoria->nome}}</option>

                @endforeach

            </select>

        </div>

      

       

        <div class="row">
            <span class="form-label">tipos</span>

            <select class="form-select" name="tipos[]" id="" multiple>
                @foreach($tipos as $tipo)

                <option value="{{$tipo->id}}" @if($produto->tipos->contains($tipo->id))selected @endif>{{$tipo->nome}}</option>

                @endforeach

            </select>

        </div>
        <div class="row">
                <span class="form-label">Destaque</span>

                <select class="form-select" name="destaque">  
                    <option value="{{$produto->destaque}}">{{$produto->destaque}}</option selected>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>

        <div class="row">
            <label class="form-label" for="">Imagem</label>
            <input type="file" class="form-control" name="imagem" >

        </div>

    
        <div class="row mt-4">

                <button type="submit" class="btn btn-success btn-sm mb-4">Salvar</button>

        </div>


    </form>

</body>

</html>