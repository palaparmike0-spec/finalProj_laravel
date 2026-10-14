@extends('layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body">
  <h3>{{ $artist->name }}</h3>
  <p class="text-muted">{{ $artist->nationality }} | {{ $artist->birth_year ?? '?' }} - {{ $artist->death_year ?? 'present' }}</p>
  <p>{{ $artist->biography }}</p>
  <h5>Exhibits by this artist</h5>
  <ul>
    @forelse($artist->exhibits as $e)
      <li><a href="{{ route('exhibits.show', $e) }}">{{ $e->title }}</a></li>
    @empty
      <li>None</li>
    @endforelse
  </ul>
  <a href="{{ route('artists.index') }}" class="btn btn-secondary">Back</a>
</div></div>
@endsection