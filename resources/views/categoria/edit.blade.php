<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar uma categoria</title>
</head>

<body>
    @include('layouts.menu')
    <h1 class="h1Categoria"> Editar categoria</h1>

    <form action="{{Route('categoria.update',$id=$c[0])}}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
        <img src="{{ asset($c[2])}}" style="width:60px">
        <label for="" class="formCateg">Nome:</label>
        <input type="text" name="nome" class="inputCateg" value="{{$c[1]}}" required>

        <div class="row">
            <label class="form-label" for="">icone</label>
            <input type="file" class="form-control" name="icone">

        </div>



        <button class="btn botaoCriar" type="submit">Salvar</button>


    </form>

</body>

</html>