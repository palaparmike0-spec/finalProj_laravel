@extends('layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body">
  <h3>{{ $exhibit->title }}</h3>
  <p class="text-muted">
    Category: <a href="{{ route('categories.show', $exhibit->category) }}">{{ $exhibit->category->name }}</a> |
    Artist: <a href="{{ route('artists.show', $exhibit->artist) }}">{{ $exhibit->artist->name }}</a>
  </p>
  <p><strong>Year:</strong> {{ $exhibit->year_created ?? '-' }} |
     <strong>Location:</strong> {{ $exhibit->gallery_location }} |
     <strong>Status:</strong> {{ ucwords(str_replace('_', ' ', $exhibit->status)) }}</p>
  <p>{{ $exhibit->description }}</p>
  <h5>Tours featuring this exhibit</h5>
  <ul>
    @forelse($exhibit->tours as $t)
      <li><a href="{{ route('tours.show', $t) }}">{{ $t->title }}</a> ({{ $t->tour_date }})</li>
    @empty
      <li>None</li>
    @endforelse
  </ul>
  <a href="{{ route('exhibits.index') }}" class="btn btn-secondary">Back</a>
</div></div>
@endsection