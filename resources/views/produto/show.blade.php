@include('layouts.menu')

<nav aria-label="breadcrumb" class="mx-5">
    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{url('/') }}">Projeto pi4</a></li>
        <li class="breadcrumb-item"><a href="{{url('/') }}">Pokemon</a></li>
        <li class="breadcrumb-item"><a href="{{url('/', $produto->categoria->nome)}}">{{ $produto->categoria->nome}}</a></li>

        <li class=" breadcrumb-item active" aria-current="page">{{$produto->nome}}</li>
    </ol>
</nav>

<div class="row mg-30">
    <div class="col-5 text-center">
        <img src="{{ asset($produto->imagem) }}" style="width: 20rem; height: 15rem;">
        <p class="text-center text-secondary" style="font-size: 0.8rem;">Imagem meramente ilustrativa</p>
    </div>

    <div class="col-2">

    </div>

    <div class="col-5 text-center mt-3 " style="max-width: 18rem;">
        <div>
            <h2 class="pb-4">{{ $produto->nome}}</h2>
            <p class="">{{ $produto->descricao }}</p>
        </div>
        <div>
            <span class="h4 my-3">  {{$produto->preco }} Pontos </span>
            <span>(Unidade)</span>
        </div>
        <div>
            @foreach($produto->tipos as $tipo)
            <a href="#" class="btn btn-sm btn-warning mt-2">{{$tipo->nome}}</a>
            @endforeach
        </div>
        <div>
        <span class="btn btn-success my-1 mt-4">Comprar</span>
        </div>
    </div>
</div>