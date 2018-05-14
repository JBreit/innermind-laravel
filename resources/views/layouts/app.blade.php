  @include('layouts.partials.head')

    <div id="app">

      @include('layouts.partials.navbar')

      @auth
        @include('layouts.partials.sidebar')
      @endauth

      @include('layouts.partials.success')

      <main class="py-4">
        @yield('content')
      </main>
    </div>

    @include('layouts.partials.scripts')

  </body>
</html>
