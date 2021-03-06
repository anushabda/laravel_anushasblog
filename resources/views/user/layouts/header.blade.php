<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="width:100%;background-color:#330000">
  <div class="container">
    <img src="{{asset('/images/anushasbloglogo.png')}}" style="width:30px;height:30px" alt="logo" />
    <a class="navbar-brand" href="#">Anusha's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav  ml-auto">
        <li class="nav-item active " id="link-home">
          <a class="nav-link " @guest href=" {{ route('welcome') }}" @else  href=" {{ route('home') }}" @endguest>Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <!--
        <li class="nav-item " id="link-about">
          <a class="nav-link " href="{{route('about')}}">About</a>
        </li>
        -->
        <li class="nav-item " id="link-about">
          <a class="nav-link " href="{{route('admin.login')}}">Admin</a>
        </li>
        <li class="nav-item" id="link-contact">
          <a class="nav-link "href="{{route('contact')}}">Contact</a>
        </li>
        @guest
            <li class="nav-item " id="link-login">
                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>

        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest

      </ul>
    </div>
  </div>

</nav>
