          <nav id="sidebar" class="col-md-2 d-md-block bg-dark sidebar h-100" aria-expanded="false">
            <div class="sidebar-sticky">
              <a class="navbar-brand mr-0 w-100" href="/">
                <img src="img/innermind-logo.svg" alt="Innermind Logo" />
                {{ config('app.name', 'Laravel') }}
              </a>
              <ul class="nav flex-column">
                <li class="nav-item {{ Request::is('admin') ? 'active' : ''}} w-100">
                  <a class="nav-link" href="/admin/">
                    <span data-feather="home"></span>
                    <span class="nav-text"> Dashboard <span class="sr-only">(current)</span></span>
                  </a>
                </li>
                <li class="nav-item w-100">
                  <a class="nav-link" href="/admin/#">
                    <span data-feather="tag"></span>
                    <span class="nav-text"> Categories</span>
                  </a>
                </li>
                <li class="nav-item w-100">
                  <a class="nav-link" href="/admin/#">
                    <span data-feather="file"></span>
                    <span class="nav-text"> Posts</span>
                  </a>
                </li>
                <li class="nav-item w-100">
                  <a class="nav-link" href="/admin/#">
                    <span data-feather="users"></span>
                    <span class="nav-text"> Users</span>
                  </a>
                </li>
                <li class="nav-item w-100">
                  <a class="nav-link" href="/admin/#">
                    <span data-feather="tag"></span>
                    <span class="nav-text"> Tags</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
