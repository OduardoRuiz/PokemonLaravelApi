    <style>
        .bloqueioTexto{
            font-size: 3rem;
            text-align: center; 
        }
        .bloqueioLink{
            font-size: 2rem;
            text-align: center;
            margin-bottom: 3rem;
        }
        .bloqueioImg, .bloqueioLink{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
       <p class="bloqueioTexto">Sem permissão para acessar a página</p>

          <form  method="POST" action="{{ route('logout') }}">
            @csrf

          
            <x-responsive-nav-link :href="route('logout')" class="text-white navbar-nav d-flex bloqueioLink" style="text-decoration: underline;" onclick="event.preventDefault();
                                        this.closest('form').submit();" >
              {{ __('Click aqui para voltar') }}
            </x-responsive-nav-link>
          </form>
          <img class="bloqueioImg" src="http://2.bp.blogspot.com/-KkzKVDyI-QU/VFqQqAhVDoI/AAAAAAAAAxw/eo-SAEyVlWA/s1600/Mais%2Buma%2Bdecolagem.gif">

      
        

    

