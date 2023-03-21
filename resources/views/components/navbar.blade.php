<div class="stretta strettamob sticky-top container-header">
  <nav id="navBar" class="navbar color sticky-top navbar-expand-lg bg-body-tertiary">
    
    <div class="container-fluid pe-1 ms-3 pe-1 ms-3">
      <div class="row w-100">
        <button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-4 d-flex">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
              </li>
              @guest
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{route('article.create')}}">Crea Articolo</a>
              </li>
              @endguest
              <li class="nav-item">
                <a class="nav-link"  href="{{route('article.index')}}">I nostri Articoli</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorie
                </a>
                <ul class="dropdown-menu">
                  @foreach ($categories as $category)
                  <li><a class="dropdown-item" href="{{route('article.byCategory' , $category)}}">{{$category->name}}</a></li>
                  <li><hr class="dropdown-divider"></li>
                  @endforeach
                </ul>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{route('careers')}}">Lavora con noi</a>
              </li>
            </ul>
          </div>
        </div>
        {{-- LOGO --}}
        <div class="col-md-4 d-flex justify-content-center">
        <a href="{{route('homepage')}}"> <img src="{{Storage::url('img/logo.png')}}" class="logo" alt="Logo"></a>
        </div>
        {{-- LOGIN E CERCA --}}
        <div class="col-2 col-md-4 d-flex ">
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              @guest
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="{{route('login')}}"><i class="fa-regular fa-user"></i></a>
              </li>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Benvenuto: {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu">
                  @auth
                  @if (Auth::user()->is_admin && Auth::user())
                    <li>
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard Admin</a>
                    </li> 
                  @endif
                  @if (Auth::user()->is_revisor && Auth::user())
                    <li>
                      <a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard del revisore</a> 
                    </li> 
                  @endif
                  @if (Auth::user()->is_writer)
                  <li>
                    <a class="dropdown-item" href="{{route('writer.dashboard')}}">Dashboard del redattore</a> 
                  </li> 
                @endif
                @endauth
                  <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">Logout</a>
                  </li>
                  <form id="logout-form" class="d-none" method="POST" action="{{route('logout')}}">
                    @csrf
                  </form>
                  @endguest
                </ul>
              </li>
              <form class="d-flex" method="GET" action="{{route('article.search')}}">
                  <input type="search" class="form-control me-2 bg-input input-nav search-media" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
                  <button class="btn" type="submit"><i class=" fa-solid fa-magnifying-glass"></i></button>
              </form>

              {{-- <li class="nav-item s">
                <a class="nav-link ms-2" aria-current="page" href="#"><i class=" fa-solid fa-magnifying-glass"></i></a>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>

  </nav>
</div>
 
          

