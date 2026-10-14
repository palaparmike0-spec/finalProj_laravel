@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h2>Categories</h2>
  <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add Category</a>
</div>
<div class="card shadow-sm"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead><tr><th>#</th><th>Name</th><th>Exhibits</th><th class="text-end">Actions</th></tr></thead>
  <tbody>
  @forelse($categories as $c)
    <tr>
      <td>{{ $c->id }}</td>
      <td>{{ $c->name }}</td>
      <td>{{ $c->exhibits_count }}</td>
      <td class="text-end">
        <a href="{{ route('categories.show', $c) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
                data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-action="{{ route('categories.destroy', $c) }}"
                data-name="{{ $c->name }}"
                data-warning="A category that still has exhibits cannot be deleted.">Delete</button>
      </td>
    </tr>
  @empty
    <tr><td colspan="4" class="text-center">No categories yet.</td></tr>
  @endforelse
  </tbody>
</table></div></div>
<div class="mt-3">{{ $categories->links('pagination::bootstrap-5') }}</div>
@endsection