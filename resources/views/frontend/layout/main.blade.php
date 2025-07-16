<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Repository Pusdatin</title>

  <link href="{{ asset('assets_frontend/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets_frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_frontend/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">

  {{-- Main Content --}}
  <main class="main mt-5 pt-5">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer id="footer" class="footer mt-5">
    <div class="container">
      <p class="text-center">&copy; {{ date('Y') }} Repository Pusdatin - All Rights Reserved</p>
    </div>
  </footer>

  <script src="{{ asset('assets_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets_frontend/js/main.js') }}"></script>
</body>
</html>
