<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Usuários Cadastrados</title>
</head>

<body>
    @include('layouts.menu')

    <main class="container mt-5 formCriarProd">
        <div>
            <form id="pesquisar" class="form-inline d-flex pb-3 " method="get" action="{{ route('search2') }}">
                <input class="form-control mr-sm-2 " size="70" type="text" name="search" placeholder="Pesquisar por Nome " aria-label="Search">
                <button class="btn btn-outline-success botaoPesquisar " type="submit">Pesquisar</button>
            </form>
        </div>
        <h1 class="h1CriarProd">Usuários Cadastrados</h1>

        <div class="mt-3 tabelaUsuario">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Usuário ou Adm
                        </th>
                        <th>
                            Opções
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)

                    <tr>

                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td><?php
                            if ($usuario->IsAdmin == 1) {
                                echo "Administrador";
                            } else {
                                echo "Usuário";
                            }
                            ?></td>
                        <td>
                            <a href="{{Route('usuario.editar',$id=$usuario->id)}}" class="btn btn-warning botaoIndex">editar</a>

                            <form method="post" action="{{Route('usuario.destroy',$id=$usuario->id)}}">

                                @method('GET')
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