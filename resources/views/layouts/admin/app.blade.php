<!DOCTYPE html>
<html lang="en">

<head>
  {{-- Head & CSS partial (moved) --}}
  @include('layouts.admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">

  {{-- Sidebar --}}
  @include('layouts.admin.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    {{-- Navbar --}}
    @include('layouts.admin.navbar')

    <div class="container-fluid py-4">
      @yield('content')
    </div>

    {{-- Footer --}}
    @include('layouts.admin.footer')
  </main>

  {{-- Scripts --}}
  @include('layouts.admin.js')

  @stack('js')
</body>

</html>
