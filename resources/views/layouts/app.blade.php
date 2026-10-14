<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Museum Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">🏛 Museum Management System</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('exhibits.*') ? 'active' : '' }}" href="{{ route('exhibits.index') }}">Exhibits</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">Categories</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('artists.*') ? 'active' : '' }}" href="{{ route('artists.index') }}">Artists</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('tours.*') ? 'active' : '' }}" href="{{ route('tours.index') }}">Tours</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('visitors.*') ? 'active' : '' }}" href="{{ route('visitors.index') }}">Visitors</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container pb-5">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif
  @yield('content')
</div>

<!-- Shared Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete <strong id="deleteName"></strong>?
        <div id="deleteWarning" class="text-danger small mt-2"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('deleteModal').addEventListener('show.bs.modal', function (event) {
    var btn = event.relatedTarget;
    document.getElementById('deleteForm').action = btn.getAttribute('data-action');
    document.getElementById('deleteName').textContent = btn.getAttribute('data-name');
    document.getElementById('deleteWarning').textContent = btn.getAttribute('data-warning') || '';
  });
</script>
</body>
</html>