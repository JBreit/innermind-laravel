    <nav class="navbar navbar-expand-md navbar-dark navbar-laravel sticky-top flex-md-nowrap p-0">
      <!-- <div class="container-fluid"> -->
        <a class="navbar-brand mr-0" href="/">
          <img src="img/innermind-logo.svg" alt="Innermind Logo" />
          {{ config('app.name', 'Laravel') }}
        </a>
        <button
          class="navbar-push-toggler"
          data-toggle="push"
          data-target="#sidebar"
          aria-controls="sidebar"
          aria-expanded="false"
          aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" data-feather="menu"></span>
        </button>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

          </ul>

          <ul class="navbar-nav ml-auto">
            @guest
              <li class="nav-item text-nowrap d-flex flex-md-row">
                <a class="nav-link" href="{{ route('login') }}">
                  {{ __('Login') }}
                </a>
              </li>
              <li>
                <a class="nav-link" href="{{ route('register') }}">
                  {{ __('Register') }}
                </a>
              </li>
            @else
              <li class="nav-item text-nowrap d-flex flex-md-row dropdown">
                <a
                  id="navbarDropdown"
                  class="nav-link dropdown-toggle settings"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  v-pre>
                    <span data-feather="settings"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <span class="dropdown-item-text">{{ Auth::user()->name }}</span>
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
