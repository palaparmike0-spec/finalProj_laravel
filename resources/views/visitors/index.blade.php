@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h2>Visitors</h2>
  <a href="{{ route('visitors.create') }}" class="btn btn-primary">+ Add Visitor</a>
</div>
<div class="card shadow-sm"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Visit Date</th><th>Tour</th><th class="text-end">Actions</th></tr></thead>
  <tbody>
  @forelse($visitors as $v)
    <tr>
      <td>{{ $v->id }}</td>
      <td>{{ $v->name }}</td>
      <td>{{ $v->email }}</td>
      <td>{{ $v->visit_date }}</td>
      <td>{{ $v->tour->title ?? '-' }}</td>
      <td class="text-end">
        <a href="{{ route('visitors.show', $v) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('visitors.edit', $v) }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
                data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-action="{{ route('visitors.destroy', $v) }}"
                data-name="{{ $v->name }}"
                data-warning="">Delete</button>
      </td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center">No visitors yet.</td></tr>
  @endforelse
  </tbody>
</table></div></div>
<div class="mt-3">{{ $visitors->links('pagination::bootstrap-5') }}</div>
@endsection