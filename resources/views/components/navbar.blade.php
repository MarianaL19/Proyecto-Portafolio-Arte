<header class="fixed-top">
    {{-- <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="/index" class="text-decoration-none">U-Art</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="/index" class="active text-decoration-none">Inicio</a></li>
          <li><a href="/commission" class="active text-decoration-none">Comisiones</a></li>
          <li><a href="/product" class="active text-decoration-none">Productos</a></li>
          <li><a href="/favorite" class="active text-decoration-none">Favoritos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div> --}}
    <div class="topnav" id="myTopnav">
      <a href="/index" style="font-size: 35px; color:black; padding: 10px 0px 4px 20px;">U-Art</a> 
        @if (Route::has('login'))
          @auth
            <div style="float: right; padding-top:9px;">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-jet-dropdown-link href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fa-solid fa-right-to-bracket" style="font-size:20px"></i><b>{{ __('  Salir') }}</b>
                </x-jet-dropdown-link>
              </form>     
            </div>
            @if (\Auth::user()->rol != "admin")
              <a href="/favorite" style="float: right;"><b>Favoritos</b></a>
            @endif
            <a href="/commission" style="float: right;"><b>Comisiones</b></a>
          @else
            <div style="float: right;">
              <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket" style="font-size:16px"></i><b>  Iniciar sesión</b></a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" ><i class="fas fa-user-plus" style="font-size:16px"></i><b>  Registrarse</b></a>
              @endif
            </div>
          @endauth   
             
        @endif
        <a href="javascript:void(0);" class="icon" onclick="myFunction()" style="font-size:20px;">
          <i class="fa fa-bars"></i>
        </a>    
        <a href="/product" style="float: right;"><b>Productos</b></a>

    </div>
</header>