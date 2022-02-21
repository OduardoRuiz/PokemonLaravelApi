<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar um Tipo</title>
</head>
<body>
@include('layouts.menu')
    <h1 class="h1Categoria">Editar tipo</h1>

    <form action="{{Route('tipo.update',$tipo->id)}}" method="post">
    @method('PATCH')
    @csrf

    <label for="" class="formCateg">Nome: </label>
    <input type="text" name="nome" class="inputCateg"
    value="{{$tipo->nome}}"required>

    


    <button type="submit" class="btn botaoCriar">salvar</button>


    </form>
    
</body>
</html>