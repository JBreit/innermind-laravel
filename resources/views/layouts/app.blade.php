  @include('layouts.partials.head')

    <div id="app">

      @include('layouts.partials.navbar')

      @include('layouts.partials.sidebar')

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
