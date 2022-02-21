<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Lixeira</title>
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5">
@if(session()->has('sucesso'))
<div>
{{session()->get('sucesso')}}
</div>
@endif



<div class="mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Nome
                </th>
                <th>
                    Quantidade
                </th>
                <th>
                    Preço
                </th>
                <th>
                    Descrição
                </th>
                <th>
                    Categoria
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
            <td>{{$produto->id}}</td>
             <td>{{$produto->nome}}</td>
             <td>{{$produto->quantidade}}</td>
             <td>{{$produto->preco}}</td>
             <td>{{$produto->descricao}}</td>
             <td>{{$produto->categoria->nome}}</td>

                <td>
                    <form action="{{Route('produto.restaurar',$produto->id)}}" method="post">
                        @method('patch')
                        @csrf

                    <button type="submit" class="btn-primary btn">restaurar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</main>
</body>
</html>