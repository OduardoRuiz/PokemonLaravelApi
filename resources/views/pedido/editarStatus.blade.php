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
        <h1 class="h1CriarProd">Mudar status do pedido</h1>

        <form action="{{Route('pedido.updaterStatus',$id=$tudo[0])}}" method="post" >
        @method('patch')
        @csrf

        <div class="row">
            <label for="" class="form-label">id</label>
            <p class="form-control">{{$tudo[0]}}</p>
        </div>

        <div class="row">
            <label for="" class="form-label">user_id</label>
            <p class="form-control">{{$tudo[1]}}</p>
        </div>

        <div class="row">
            <label for="" class="form-label">Endereço</label>
            <p class="form-control">{{$tudo[2]}}</p>
        </div>

        <div class="row">
            <span class="form-label">Status Pedidos</span>

            <select class="form-select" name="status" id="">
                
                <option value="Pedido Realizado" >Pedido Realizado</option>

                <option value="Pedido em Processamento" >Pedido em Processamento</option>

                <option value="Pedido Concluido" >Pedido Concluido</option>

                <option value="Pedido Cancelado" >Pedido Cancelado</option>

                <option value="Erro por gentileza entre em contato com os sac" >Erro por gentileza entre em contato com o SAC </option>

            </select>

        </div>

        <div class="row mt-4">

                <button type="submit" class="btn btn-success btn-lg mb-4">Salvar</button>

        </div>
        </form>
            
    </main>
</body>

</html>