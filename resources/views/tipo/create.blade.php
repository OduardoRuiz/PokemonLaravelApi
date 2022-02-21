<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar um Tipo</title>
</head>
<body>
@include('layouts.menu')
    <h1 class="h1Categoria">Cadastrar tipo</h1>

    <form action="{{Route('tipo.store')}}" method="post">
    @csrf

    <label for="" class="formCateg">Nome: </label>
    <input type="text" name="nome" class="inputCateg" required>

   

    <button type="submit"  class=" btn btn btn-success ">Salvar</button>


    </form>
    
</body>
</html>