@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h2>Tours</h2>
  <a href="{{ route('tours.create') }}" class="btn btn-primary">+ Add Tour</a>
</div>
<div class="card shadow-sm"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead><tr><th>#</th><th>Title</th><th>Exhibit</th><th>Guide</th><th>Date</th><th>Price</th><th>Booked</th><th class="text-end">Actions</th></tr></thead>
  <tbody>
  @forelse($tours as $t)
    <tr>
      <td>{{ $t->id }}</td>
      <td>{{ $t->title }}</td>
      <td>{{ $t->exhibit->title ?? '-' }}</td>
      <td>{{ $t->guide_name }}</td>
      <td>{{ $t->tour_date }}</td>
      <td>{{ number_format($t->price, 2) }}</td>
      <td>{{ $t->visitors_count }}/{{ $t->capacity }}</td>
      <td class="text-end">
        <a href="{{ route('tours.show', $t) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('tours.edit', $t) }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
                data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-action="{{ route('tours.destroy', $t) }}"
                data-name="{{ $t->title }}"
                data-warning="All visitors booked on this tour ({{ $t->visitors_count }}) will also be deleted.">Delete</button>
      </td>
    </tr>
  @empty
    <tr><td colspan="8" class="text-center">No tours yet.</td></tr>
  @endforelse
  </tbody>
</table></div></div>
<div class="mt-3">{{ $tours->links('pagination::bootstrap-5') }}</div>
@endsection