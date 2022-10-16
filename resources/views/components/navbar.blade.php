<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ ('Login') }} </a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a></li>
            @else
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manajemen Users</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manajemen Roles</a></li>
                            <li><a class="nav-link" href="{{ route('movies.index') }}">Manajemen Konten</a></li>
                            <li><a class="nav-link" href="{{ route('token.index') }}">Manajemen Token</a></li>
                            <li class="nav-link">
                              Hai, {{ Auth::user()->name }} <span class="caret">
                            </li>
                            <li class="nav-link">
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Keluar') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>