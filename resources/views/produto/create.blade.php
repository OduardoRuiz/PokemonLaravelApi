<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Criar um Produto</title>
</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5 formCriarProd">
        <h1 class="h1CriarProd">Cadastrar produto</h1>

        <form action="{{Route('produto.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="row">
            <span class="form-label">Nome</span>
            <input type="text" name="nome" class="form-control">
            </div>

            
            <div class="row">
                <span class="form-label">Quantidade</span>
                <input type="number" min="0" max="1000000" name="quantidade" class="form-control" required>
            </div>
            
            
            <div class="row">
                <span class="form-label">Preço</span>
                <input type="number" min="0.00" max="10000.00" name="preco" step="0.01" class="form-control" required>
            </div>
            <div class="row">
                <span class="form-label">Descrição</span >
                <textarea class="form-control" name="descricao" required></textarea >
            </div>
            <div class="row">
                <span class="form-label">Categoria</span>
                <select class="form-select" name="categoria_id" required>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
            </div>

            

            <div class="row">
                <span class="form-label">Tipo</span>
                <select class="form-select" name="tipos[]">
                    @foreach($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <span class="form-label">Destaque</span>
                <select class="form-select" name="destaque">  
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
            <div class="row">
                <span class="form-label">Imagem</span>
                <input type="file" class="form-control" name="imagem">
            </div>

            <div class="row mt-4">
                <button type="submit" class="btn btn-success btn-lg mb-4">Salvar</button>
            </div>

        </form>
    </main>
</body>

</html>