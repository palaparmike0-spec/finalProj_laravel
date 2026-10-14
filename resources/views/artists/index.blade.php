@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h2>Artists</h2>
  <a href="{{ route('artists.create') }}" class="btn btn-primary">+ Add Artist</a>
</div>
<div class="card shadow-sm"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead><tr><th>#</th><th>Name</th><th>Nationality</th><th>Born</th><th>Exhibits</th><th class="text-end">Actions</th></tr></thead>
  <tbody>
  @forelse($artists as $a)
    <tr>
      <td>{{ $a->id }}</td>
      <td>{{ $a->name }}</td>
      <td>{{ $a->nationality }}</td>
      <td>{{ $a->birth_year ?? '-' }}</td>
      <td>{{ $a->exhibits_count }}</td>
      <td class="text-end">
        <a href="{{ route('artists.show', $a) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('artists.edit', $a) }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
                data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-action="{{ route('artists.destroy', $a) }}"
                data-name="{{ $a->name }}"
                data-warning="An artist who still has exhibits cannot be deleted.">Delete</button>
      </td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center">No artists yet.</td></tr>
  @endforelse
  </tbody>
</table></div></div>
<div class="mt-3">{{ $artists->links('pagination::bootstrap-5') }}</div>
@endsection