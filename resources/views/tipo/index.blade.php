<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Lista de Tipos</title>
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5">

    <div >
            <form id="pesquisar" class="form-inline d-flex pb-3 " method="get" action="{{ route('search5') }}">
                            <input class="form-control mr-sm-2 " size="70" type="text" name="search" placeholder="Pesquisar por Nome do Tipo" aria-label="Search">
                            <button class="btn btn-outline-success botaoPesquisar " type="submit">Pesquisar</button>
                        </form>
        </div>
        @if(session()->has('sucesso'))
        <div>
            {{session()->get('sucesso')}}
        </div>
        @endif

        <a href="{{route('tipo.create')}}" class="btn botaoCriar btn-lg">Criar Tipo</a>


        <div class="mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            nome
                        </th>
                        <th title="Quantidade de produtos usando a categoria">
                            Quantidade

                        </th>
                        <th>
                            opções
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $tipo)
                    <tr>
                        <td>{{$tipo->id}}</td>
                        <td>{{$tipo->nome}} </td>
                        <td> {{$tipo->produtos()->count()}}</td>

                        <td>


                            <a href="{{Route('tipo.edit',$tipo->id)}}" class="btn btn-warning botaoIndex">editar</a>

                            <form method="post" action="{{Route('tipo.destroy',$tipo->id)}}">

                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn-danger btn mt-2 botaoIndex">apagar</button>
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