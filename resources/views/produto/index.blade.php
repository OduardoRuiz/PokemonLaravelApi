<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>painel de Controle</title>
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5">
        @if(session()->has('sucesso'))
        <div>
            {{session()->get('sucesso')}}
        </div>
        @endif
        <div >
            <form id="pesquisar" class="form-inline d-flex pb-3 " method="get" action="{{ route('search') }}">
                            <input class="form-control mr-sm-2 " size="70" type="text" name="search" placeholder="Pesquisar por Nome do Pokemon" aria-label="Search">
                            <button class="btn btn-outline-success botaoPesquisar " type="submit">Pesquisar</button>
                        </form>
        </div>

        <a href="{{Route('produto.create')}}" class="btn botaoCriar btn-lg">criar produto</a>

        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Imagem
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Quantidade
                        </th>
                        <th>
                            Pontos
                        </th>
                        <th>
                            Descrição
                        </th>

                        <th>
                            Categoria
                        </th>
                        <th>
                            Destaque
                        </th>
                        <th>
                            Opções
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td><img src="{{ asset($produto->imagem)}}" style="width:35px"></td>
                        
                        
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->quantidade}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->descricao}}</td>

                        <td>{{$produto->categoria->nome}}</td>
                        <td>{{$produto->destaque}}</td>


                        <td>
                            <a href="{{Route('produto.show',$produto->id)}}" class="btn  btn-success mt-2 botaoIndex">Visualizar</a>

                            <a href="{{Route('produto.edit',$produto->id)}}" class="btn  btn-warning botaoIndex mt-2">Editar</a>


                            <form method="post" action="{{Route('produto.destroy',$produto->id)}}">

                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn-danger btn  mt-2 botaoIndex"> Apagar</button>
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