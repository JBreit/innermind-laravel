    <nav class="navbar navbar-expand-md navbar-dark navbar-laravel fixed-top flex-md-nowrap p-0">
      <!-- <div class="container-fluid"> -->
        <a class="navbar-brand mr-0" href="/">
          <img src="img/innermind-logo.svg" alt="Innermind Logo" />
          {{ config('app.name', 'Laravel') }}
        </a>
        @auth
          <button
            class="navbar-push-toggler mr-auto"
            data-toggle="push"
            data-target="#sidebar"
            aria-controls="sidebar"
            aria-expanded="false"
            aria-label="Toggle navigation">
              <span class="navbar-toggler-icon" data-feather="menu"></span>
          </button>
        @endauth
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" data-feather="settings"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

          </ul>

          <ul class="navbar-nav ml-auto">
            @guest
              <li class="nav-item text-nowrap d-flex flex-md-row {{ Request::is('login') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('login') }}">
                  {{ __('Login') }}
                </a>
              </li>
              <li class="nav-item text-nowrap d-flex flex-md-row {{ Request::is('register') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('register') }}">
                  {{ __('Register') }}
                </a>
              </li>
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown"
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a
                    class="dropdown-item"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
      <!-- </div> -->
    </nav>
