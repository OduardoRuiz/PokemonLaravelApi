<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Pedidos</title>
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5 formCriarProd">
        <h1 class="h1CriarProd">Item</h1>
        <h3>Total <?php 
                       $valor=0.0;
                        foreach ($itens as $item) {
                            $valor= $valor + $item->preco;
                        }
                        echo($valor .  ".00");
                        
                        ?></h3>

        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>
                            ID
                        </th>
                        <th>
                            Pedido id
                        </th>
                        <th>
                            Produto id
                        </th>
                        <th>
                            Imagem
                        </th>

                        <th>
                            quantidade
                        </th>
                        <th>
                            preço
                        </th>



                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)

                    <tr>

                        <td>{{$item->id}}</td>
                        <td>{{$item->pedido_id}}</td>
                        <td>{{$item->produto_id}}</td>
                        <td>
                        
                        <img src="{{ asset($item->imagem)}}" style="width:35px">

                        </td>
                        <td>{{$item->quantidade}}</td>
                        <td>{{$item->preco}}</td>


                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>

    </main>
</body>

</html>