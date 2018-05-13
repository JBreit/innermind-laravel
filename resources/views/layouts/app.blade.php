  @include('layouts.partials.head')

    <div id="app">

      @include('layouts.partials.navbar')

      @auth
        @include('layouts.partials.sidebar')
      @endauth

      @if (session('status'))
        <div id="flash-message" class="alert alert-success flash-message" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <main class="py-4">
        @yield('content')
      </main>
    </div>

    @include('layouts.partials.scripts')

  </body>
</html>
