<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"/>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<header>

  <nav class="navbar navbar-expand-md menuAdm ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="https://cdn-icons-png.flaticon.com/512/361/361998.png" class="logo"></a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse"  id="navbarNavAltMarkup">
        <div class="navbar-nav">
        
          <a class="nav-link menuAdm" href="{{route('produto.index')}}" >Produto</a>
       
      
          <a class="nav-link menuAdm" href="{{route('categoria.index')}}">Categoria</a>
        
        
          <a class="nav-link menuAdm" href="{{route('tipo.index')}}">Tipo</a>
        
          <a class="nav-link menuAdm" href="{{route('produto.lixeira')}}">Lixeira</a>

          <a class="nav-link menuAdm" href="{{route('usuario.usuarios')}}">Usuários</a>

          <a class="nav-link menuAdm" href="{{Route('pedido.pedidos')}}">Pedidos</a>


          
      
          <div class="nav-link d-flex menuAdm">{{ Auth::user()->name }}</div>
      
          <div class="text-white" >

          <form  method="POST" action="{{ route('logout') }}">
            @csrf

          
            <x-responsive-nav-link :href="route('logout')" class="text-white navbar-nav d-flex " style="text-decoration: underline;" onclick="event.preventDefault();
                                        this.closest('form').submit();" >
              {{ __('Log out') }}
            </x-responsive-nav-link>
          </form>
      
          </div>


        </div>
      </div>
    </div>
  </nav>
</header> 
