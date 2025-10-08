<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Real Estate Leads</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">
    
    <!-- Logo + Brand -->
    <a class="navbar-brand d-flex align-items-center" href="{{ route('leads.index') }}">
      <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40" class="me-2">
      <span class="fw-bold text-dark">Leads Admin</span>
    </a>

    <!-- Right side button - only on index page -->
    @if (request()->routeIs('leads.index'))
      <div>
        <a class="btn btn-sm btn-primary" href="{{ route('leads.create') }}">+ Add Lead</a>
      </div>
    @endif

  </div>
</nav>

<div class="container">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@yield('scripts')
</body>
</html>
