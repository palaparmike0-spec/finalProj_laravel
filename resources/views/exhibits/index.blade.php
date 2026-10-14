@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h2>Exhibits</h2>
  <a href="{{ route('exhibits.create') }}" class="btn btn-primary">+ Add Exhibit</a>
</div>
<div class="card shadow-sm"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead><tr><th>#</th><th>Title</th><th>Category</th><th>Artist</th><th>Location</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
  <tbody>
  @forelse($exhibits as $e)
    <tr>
      <td>{{ $e->id }}</td>
      <td>{{ $e->title }}</td>
      <td>{{ $e->category->name }}</td>
      <td>{{ $e->artist->name }}</td>
      <td>{{ $e->gallery_location }}</td>
      <td>
        @if($e->status === 'on_display')<span class="badge bg-success">On Display</span>
        @elseif($e->status === 'in_storage')<span class="badge bg-secondary">In Storage</span>
        @else<span class="badge bg-warning text-dark">On Loan</span>@endif
      </td>
      <td class="text-end">
        <a href="{{ route('exhibits.show', $e) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('exhibits.edit', $e) }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
                data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-action="{{ route('exhibits.destroy', $e) }}"
                data-name="{{ $e->title }}"
                data-warning="Tours that feature this exhibit will be kept, but will no longer be linked to an exhibit.">Delete</button>
      </td>
    </tr>
  @empty
    <tr><td colspan="7" class="text-center">No exhibits yet.</td></tr>
  @endforelse
  </tbody>
</table></div></div>
<div class="mt-3">{{ $exhibits->links('pagination::bootstrap-5') }}</div>
@endsection