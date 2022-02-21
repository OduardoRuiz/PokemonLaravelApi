<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>criar uma categoria</title>
</head>
<body>
@include('layouts.menu')
    <h1 class="h1Categoria">Cadastrar categoria</h1>

    <form action="{{Route('categoria.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <label for="" class="formCateg">Nome: </label>
    <input type="text" name="nome" class="inputCateg" required>
    </div>
    <div class="row">
                <span class="form-label mt-3">Icone</span>
                <input type="file" class="form-control" name="icone">
            </div>



    <button class=" btn btn-success mb-4 botaoSalvar" type="submit">Salvar</button>


    </form>
</body>
</html>